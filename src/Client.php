<?php
namespace KarGo;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use KarGo\Exceptions\KarGoException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    protected $http;
    protected $appId;
    protected $appToken;

    public function __construct(array $config = [])
    {
        $baseUrl = isset($config['base_url']) ? rtrim($config['base_url'], '/') : '';
        $this->appId = isset($config['app_id']) ? $config['app_id'] : '';
        $this->appToken = isset($config['app_token']) ? $config['app_token'] : '';
        if (!$baseUrl) throw new \InvalidArgumentException('KARGO_BASE_URL is required.');
        if (!$this->appId || !$this->appToken) throw new \InvalidArgumentException('KARGO_APP_ID and KARGO_APP_TOKEN are required.');
        $this->http = new HttpClient([
            'base_uri' => $baseUrl . '/',
            'timeout' => isset($config['timeout']) ? (int) $config['timeout'] : 30,
            'connect_timeout' => isset($config['connect_timeout']) ? (int) $config['connect_timeout'] : 10,
            'verify' => isset($config['verify_ssl']) ? (bool) $config['verify_ssl'] : true,
            'http_errors' => false,
        ]);
    }

    public function request($method, $uri, array $options = [], $raw = false)
    {
        $headers = isset($options['headers']) ? $options['headers'] : [];
        $options['headers'] = array_merge($headers, [
            'X-App-Id' => $this->appId,
            'X-App-Token' => $this->appToken,
            'Accept' => '*/*',
        ]);
        try {
            $response = $this->http->request(strtoupper($method), ltrim($uri, '/'), $options);
        } catch (GuzzleException $e) {
            throw new KarGoException('KarGo request failed: ' . $e->getMessage(), 0, null, 0, $e);
        }
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status < 200 || $status >= 300) {
            $decoded = json_decode($body, true);
            $message = is_array($decoded) && isset($decoded['message']) ? $decoded['message'] : ('KarGo HTTP error: ' . $status);
            throw new KarGoException($message, $status, $decoded !== null ? $decoded : $body);
        }
        if ($raw) return $response;
        if ($body === '') return null;
        $decoded = json_decode($body, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : $body;
    }

    public function get($uri, array $query = []) { return $this->request('GET', $uri, ['query' => $query]); }
    public function post($uri, $data = []) { return $this->request('POST', $uri, ['json' => $data]); }
    public function put($uri, $data = []) { return $this->request('PUT', $uri, ['json' => $data]); }
    public function delete($uri, array $query = []) { return $this->request('DELETE', $uri, ['query' => $query]); }

    public function upload($uri, $file)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $path = $file->getRealPath();
            $name = $file->getClientOriginalName();
        } else {
            $path = (string) $file;
            $name = basename($path);
        }
        if (!$path || !is_file($path)) throw new \InvalidArgumentException('Upload file does not exist.');
        $stream = fopen($path, 'r');
        try {
            return $this->request('POST', $uri, ['multipart' => [['name' => 'file', 'contents' => $stream, 'filename' => $name]]]);
        } finally { if (is_resource($stream)) fclose($stream); }
    }

    public function download($uri, array $query = [])
    {
        return $this->request('GET', $uri, ['query' => $query], true);
    }
}
