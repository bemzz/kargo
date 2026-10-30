# KarGo Laravel 8 SDK 集成包

基于上传的 OpenAPI 3.0 文档生成，正式环境地址 `https://openapi.kargocash.com`。共覆盖 35 个接口。

## 安装

建议将本目录放到 Laravel 项目的 `packages/kargo/laravel8-sdk`，在项目根目录 `composer.json` 增加本地 path repository：

```json
{
  "repositories": [{"type": "path", "url": "packages/kargo/laravel8-sdk", "options": {"symlink": true}}]
}
```

然后执行：

```bash
composer require kargo/laravel8-sdk:*
php artisan vendor:publish --tag=kargo-config
```

将 `.env.example` 中的 `KARGO_*` 配置项复制到项目根目录 `.env`。Laravel Composer package auto-discovery 会自动注册 ServiceProvider；如关闭了 auto-discovery，请手动在 `config/app.php` 注册 `KarGo\KarGoServiceProvider::class`。

## 配置

```dotenv
KARGO_BASE_URL=https://openapi.kargocash.com
KARGO_APP_ID=你的AppId
KARGO_APP_TOKEN=你的AppToken
KARGO_TIMEOUT=30
KARGO_CONNECT_TIMEOUT=10
KARGO_VERIFY_SSL=true
```

## 调用示例

```php
use KarGo\Services\ProductService;

class ProductController extends Controller
{
    public function index(ProductService $products)
    {
        return response()->json($products->page(['current' => 1, 'size' => 20]));
    }
}
```

文件上传：`$fileService->upload($request->file('file'))`；下载：`$response = $fileService->download($filePath)`，可使用 `$response->getBody()` 读取文件流。

## 服务与接口清单

### 文件上传下载 (`FileService`)

- `upload()` — `POST /openapi/file/upload` — 上传文件
- `download()` — `GET /openapi/file/download` — 下载文件

### 产品管理 (`ProductService`)

- `page()` — `POST /openapi/product/page` — 分页查询

### 仓库管理 (`WarehouseService`)

- `page()` — `POST /openapi/warehouse/page` — 分页查询

### 云仓库存 (`CloudInventoryService`)

- `inventoryPage()` — `POST /openapi/warehouse/inventory/page` — 分页查询

### DF库存 (`DfStockService`)

- `stockPage()` — `POST /openapi/df/stock/page` — 分页查询
- `stockAvailable()` — `PUT /openapi/df/stock/available` — 修改可用库存

### PO订单 (`PoOrderService`)

- `poOrderPage()` — `POST /openapi/order/po-order/page` — 分页查询
- `poOrderItemDeliveryWarehouse()` — `POST /openapi/order/po-order/po-order-item-delivery-warehouse` — 获取可发货仓库
- `poOrderConfirm()` — `POST /openapi/order/po-order/confirm` — 确认接单

### DF订单 (`DfOrderService`)

- `dfOrderPage()` — `POST /openapi/order/df-order/page` — 分页查询
- `dfOrderLabelCreate()` — `POST /openapi/order/df-order/label/create` — 创建标签

### 发货单 (`ShippingOrderService`)

- `shippingOrderPage()` — `POST /openapi/warehouse/shipping-order/page` — 分页查询
- `shippingOrderDetail()` — `GET /openapi/warehouse/shipping-order/detail` — 详情查询
- `shippingOrderPoOrderPage()` — `POST /openapi/warehouse/shipping-order/po-order/page` — 可创建发货单的PO订单分页查询
- `shippingOrderCreate()` — `POST /openapi/warehouse/shipping-order/create` — 创建发货单
- `shippingOrderShipConfirm()` — `POST /openapi/warehouse/shipping-order/ship/confirm` — 发货确认
- `shippingOrderCancel()` — `POST /openapi/warehouse/shipping-order/cancel` — 取消发货单

### 云仓出库单 (`CloudOutboundService`)

- `cloudOutboundOrderPage()` — `POST /openapi/warehouse/cloud-outbound-order/page` — 分页查询

### 广告发票 (`AdInvoiceService`)

- `invoicePage()` — `POST /openapi/ad/invoice/page` — 分页查询
- `invoiceDetail()` — `GET /openapi/ad/invoice/detail` — 详情

### Coop 发票 (`CoopInvoiceService`)

- `coopPage()` — `POST /openapi/invoice/coop/page` — 分页查询
- `coopDetails()` — `GET /openapi/invoice/coop/details` — 详情
- `coopSummaryPage()` — `POST /openapi/invoice/coop/summary/page` — Summary 分页查询
- `coopAccrualForVendorPage()` — `POST /openapi/invoice/coop/accrual-for-vendor/page` — Accrual For Current Period 分页查询

### 罚款管理 (`ChargebackService`)

- `page()` — `POST /openapi/chargeback/page` — 分页查询
- `shipInOwnContainerDetails()` — `POST /openapi/chargeback/ship-in-own-container/details` — Ship in Own Container 详情
- `noCartonDetails()` — `POST /openapi/chargeback/no-carton/details` — No carton/package content label 详情
- `asnAccuracyDetails()` — `POST /openapi/chargeback/asn-accuracy/details` — ASN accuracy 详情
- `pickupAccuracyDetails()` — `POST /openapi/chargeback/pickup-accuracy/details` — Pickup accuracy 详情
- `prepExternalBubbleWrappingDetails()` — `POST /openapi/chargeback/prep-external-bubble-wrapping/details` — Prep - External bubble wrapping 详情
- `poOnTimeAccuracyDetails()` — `POST /openapi/chargeback/po-on-time-accuracy/details` — PO on-time accuracy 详情
- `inFullDeliveryDetails()` — `POST /openapi/chargeback/in-full-delivery/details` — In full delivery 详情
- `onTimeShipmentDetails()` — `POST /openapi/chargeback/on-time-shipment/details` — On time shipment 详情
- `receivingAccuracyDetails()` — `POST /openapi/chargeback/receiving-accuracy/details` — Receiving Accuracy 详情

## 认证说明

所有接口通过 `X-App-Id`、`X-App-Token` 请求头认证。当前 OpenAPI 文件没有 Token 申请/刷新端点，故本 SDK 使用固定配置值；如 KarGo 实际提供动态 Token 机制，请补充接入说明后再扩展。

## 异常处理

非 2xx 响应会抛出 `KarGo\Exceptions\KarGoException`，可通过 `getHttpStatus()` 和 `getResponseBody()` 读取状态码及响应内容。网络错误同样抛出该异常。
