<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class CloudInventoryService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/warehouse/inventory/page */
    public function inventoryPage($data = []) { return $this->client->post('/openapi/warehouse/inventory/page', $data); }

}
