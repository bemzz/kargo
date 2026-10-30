<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class DfOrderService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/order/df-order/page */
    public function dfOrderPage($data = []) { return $this->client->post('/openapi/order/df-order/page', $data); }

    /** 创建标签 | POST /openapi/order/df-order/label/create */
    public function dfOrderLabelCreate($data = []) { return $this->client->post('/openapi/order/df-order/label/create', $data); }

}
