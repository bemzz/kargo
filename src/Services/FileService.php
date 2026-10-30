<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class FileService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 上传文件 | POST /openapi/file/upload */
    public function upload($file) { return $this->client->upload('/openapi/file/upload', $file); }

    /** 下载文件 | GET /openapi/file/download */
    public function download($filePath) { return $this->client->download('/openapi/file/download', ['filePath' => $filePath]); }

}
