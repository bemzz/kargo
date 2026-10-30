<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class WarehouseService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/warehouse/page */
    public function page($data = []) { return $this->client->post('/openapi/warehouse/page', $data); }

}
