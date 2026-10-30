<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class ShippingOrderService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/warehouse/shipping-order/page */
    public function shippingOrderPage($data = []) { return $this->client->post('/openapi/warehouse/shipping-order/page', $data); }

    /** 详情查询 | GET /openapi/warehouse/shipping-order/detail */
    public function shippingOrderDetail(array $query = []) { return $this->client->get('/openapi/warehouse/shipping-order/detail', $query); }

    /** 可创建发货单的PO订单分页查询 | POST /openapi/warehouse/shipping-order/po-order/page */
    public function shippingOrderPoOrderPage($data = []) { return $this->client->post('/openapi/warehouse/shipping-order/po-order/page', $data); }

    /** 创建发货单 | POST /openapi/warehouse/shipping-order/create */
    public function shippingOrderCreate($data = []) { return $this->client->post('/openapi/warehouse/shipping-order/create', $data); }

    /** 发货确认 | POST /openapi/warehouse/shipping-order/ship/confirm */
    public function shippingOrderShipConfirm($data = []) { return $this->client->post('/openapi/warehouse/shipping-order/ship/confirm', $data); }

    /** 取消发货单 | POST /openapi/warehouse/shipping-order/cancel */
    public function shippingOrderCancel($data = []) { return $this->client->post('/openapi/warehouse/shipping-order/cancel', $data); }

}
