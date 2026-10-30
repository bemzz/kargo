<?php
namespace KarGo\Exceptions;

use RuntimeException;

class KarGoException extends RuntimeException
{
    protected $httpStatus;
    protected $responseBody;

    public function __construct($message, $httpStatus = 0, $responseBody = null, $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, (int) $code, $previous);
        $this->httpStatus = (int) $httpStatus;
        $this->responseBody = $responseBody;
    }
    public function getHttpStatus() { return $this->httpStatus; }
    public function getResponseBody() { return $this->responseBody; }
}
