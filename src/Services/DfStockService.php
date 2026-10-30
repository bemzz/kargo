<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class DfStockService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/df/stock/page */
    public function stockPage($data = []) { return $this->client->post('/openapi/df/stock/page', $data); }

    /** 修改可用库存 | PUT /openapi/df/stock/available */
    public function stockAvailable(array $data = []) { return $this->client->put('/openapi/df/stock/available', $data); }

}
