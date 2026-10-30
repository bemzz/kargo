<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class CoopInvoiceService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/invoice/coop/page */
    public function coopPage($data = []) { return $this->client->post('/openapi/invoice/coop/page', $data); }

    /** 详情 | GET /openapi/invoice/coop/details */
    public function coopDetails(array $query = []) { return $this->client->get('/openapi/invoice/coop/details', $query); }

    /** Summary 分页查询 | POST /openapi/invoice/coop/summary/page */
    public function coopSummaryPage($data = []) { return $this->client->post('/openapi/invoice/coop/summary/page', $data); }

    /** Accrual For Current Period 分页查询 | POST /openapi/invoice/coop/accrual-for-vendor/page */
    public function coopAccrualForVendorPage($data = []) { return $this->client->post('/openapi/invoice/coop/accrual-for-vendor/page', $data); }

}
