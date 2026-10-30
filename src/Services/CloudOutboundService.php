<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class CloudOutboundService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/warehouse/cloud-outbound-order/page */
    public function cloudOutboundOrderPage($data = []) { return $this->client->post('/openapi/warehouse/cloud-outbound-order/page', $data); }

}
