<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class PoOrderService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/order/po-order/page */
    public function poOrderPage($data = []) { return $this->client->post('/openapi/order/po-order/page', $data); }

    /** 获取可发货仓库 | POST /openapi/order/po-order/po-order-item-delivery-warehouse */
    public function poOrderItemDeliveryWarehouse($data = []) { return $this->client->post('/openapi/order/po-order/po-order-item-delivery-warehouse', $data); }

    /** 确认接单 | POST /openapi/order/po-order/confirm */
    public function poOrderConfirm($data = []) { return $this->client->post('/openapi/order/po-order/confirm', $data); }

}
