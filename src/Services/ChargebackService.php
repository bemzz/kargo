<?php
namespace KarGo\Services;

use KarGo\Client;

/** Generated from the KarGo OpenAPI 3.0 specification. */
class ChargebackService
{
    protected $client;

    public function __construct(Client $client) { $this->client = $client; }

    /** 分页查询 | POST /openapi/chargeback/page */
    public function page($data = []) { return $this->client->post('/openapi/chargeback/page', $data); }

    /** Ship in Own Container 详情 | POST /openapi/chargeback/ship-in-own-container/details */
    public function shipInOwnContainerDetails($data = []) { return $this->client->post('/openapi/chargeback/ship-in-own-container/details', $data); }

    /** No carton/package content label 详情 | POST /openapi/chargeback/no-carton/details */
    public function noCartonDetails($data = []) { return $this->client->post('/openapi/chargeback/no-carton/details', $data); }

    /** ASN accuracy 详情 | POST /openapi/chargeback/asn-accuracy/details */
    public function asnAccuracyDetails($data = []) { return $this->client->post('/openapi/chargeback/asn-accuracy/details', $data); }

    /** Pickup accuracy 详情 | POST /openapi/chargeback/pickup-accuracy/details */
    public function pickupAccuracyDetails($data = []) { return $this->client->post('/openapi/chargeback/pickup-accuracy/details', $data); }

    /** Prep - External bubble wrapping 详情 | POST /openapi/chargeback/prep-external-bubble-wrapping/details */
    public function prepExternalBubbleWrappingDetails($data = []) { return $this->client->post('/openapi/chargeback/prep-external-bubble-wrapping/details', $data); }

    /** PO on-time accuracy 详情 | POST /openapi/chargeback/po-on-time-accuracy/details */
    public function poOnTimeAccuracyDetails($data = []) { return $this->client->post('/openapi/chargeback/po-on-time-accuracy/details', $data); }

    /** In full delivery 详情 | POST /openapi/chargeback/in-full-delivery/details */
    public function inFullDeliveryDetails($data = []) { return $this->client->post('/openapi/chargeback/in-full-delivery/details', $data); }

    /** On time shipment 详情 | POST /openapi/chargeback/on-time-shipment/details */
    public function onTimeShipmentDetails($data = []) { return $this->client->post('/openapi/chargeback/on-time-shipment/details', $data); }

    /** Receiving Accuracy 详情 | POST /openapi/chargeback/receiving-accuracy/details */
    public function receivingAccuracyDetails($data = []) { return $this->client->post('/openapi/chargeback/receiving-accuracy/details', $data); }

}
