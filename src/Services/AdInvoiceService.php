<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class AdInvoiceService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/ad/invoice/page */
    public function invoicePage($data = []) { return $this->client->post('/openapi/ad/invoice/page', $data); }

    /** 详情 | GET /openapi/ad/invoice/detail */
    public function invoiceDetail(array $query = []) { return $this->client->get('/openapi/ad/invoice/detail', $query); }

}
