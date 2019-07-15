<h1 align="center"> wangdiantong-sdk 旺店通SDK</h1>

<p align="center"> .</p>

> http://doc.wangdian.cn/  旺店通开放平台api文档


## 安装

```shell
$ composer require slpcode/wangdiantong-sdk -vvv
```

## 使用
```php
<?php

use Slpcode\WangDianTongSdk\WangDianTongSdk;

$config = [
    'appkey' => 'xxxx',
    'appsecret' => 'xxxx',
    'sid' => 'xxxxxx',
    'baseUrl' => 'xxxxxxxx',
];

// 实例化旺店通sdk
$wtd = new WangDianTongSdk($config);

$basic = $wtd->basic; // 基础类接口实例
$goods = $wtd->goods; // 货品类接口实例
$trade = $wtd->trade; // 订单类接口实例
$stock = $wtd->stock; // 库存类接口实例
$purchase = $wtd->purchase; // 采购类接口实例
$refund = $wtd->refund; // 售后退款类接口实例

```

> 基础类接口
```php
<?php

// 查询店铺
$basic->shop($otherParams = []);

// 查询仓库详细信息
$basic->warehouseQuery($otherParams = []);

// 获取ERP的物流公司档案资料 查询物流
$basic->logistics($otherParams = []);

// 查询供应商管理
$basic->purchaseProviderQuery($column, $otherParams = []);

// 推送供应商档案资料给ERP	 创建供应商
$basic->purchaseProviderCreate($provider_no, $provider_name, $min_purchase_num, $purchase_cycle_days, $arrive_cycle_days, $otherParams = []);

```

> 货品类
```php
<?php
// 货品类
// 创建货品档案
$goods->goodsPush($goods_list);

// 查询货品档案
$goods->goodsQuery($start_time, $end_time, $otherParams = []);

// 创建平台货品
$goods->apiGoodsspecPush($platform_id, $shop_no, $goods_list);

// 查询组合装
$goods->suitesQuery($start_time, $end_time, $suite_no, $otherParams = []);

```

> 采购类
```php
<?php
// 创建采购单
$purchase->purchaseOrderPush($purchase_info);

// 推送采购单对应的入库单给ERP 创建采购入库单
$purchase->stockinPurchasePush($purchase_info);

// 获取ERP的采购单信息 查询采购单管理
$purchase->purchaseOrderQuery($start_time, $end_time, $otherParams = []);

// 获取ERP采购单对应的入库单信息 查询采购入库单
$purchase->stockinOrderQueryPurchase($start_time, $end_time, $otherParams = []);

// 推送采购退货单据给ERP 创建采购退货单
$purchase->purchaseReturnPush($return_info);

// 推送采购退货单对应的出库单给ERP 创建采购退货出库单
$purchase->purchaseReturnOrderPush($purchase_return_info);

// 获取ERP的采购退货单信息 查询采购退货单
$purchase->purchaseReturnQuery($start_time, $end_time, $otherParams = []);

// 查询ERP中采购退货出库单信息 查询采购退货出库单
$purchase->stockoutOrderQueryReturn($start_time, $end_time, $otherParams = []);

```

> 售后退款类
```php
<?php
// 创建原始退款单
$refund->salesRefundPush($api_refund_list);

// 创建销售退货入库单
// 推送ERP销售退货（换货）订单对应的入库单据给ERP 推送前提ERP的退换单状态为“待收货”
$refund->stockinRefundPush($stockin_refund_info);

// 获取ERP销售退货（换货）订单信息 查询退换管理
$refund->refundQuery($start_time, $end_time, $otherParams = []);

// 获取ERP销售退货（换货）订单对应的入库单信息 查询退货入库单管理
$refund->stockinOrderQueryRefund($start_time, $end_time, $otherParams = []);

```


> 库存类接口
```php
<?php
// 查询库存API
$stock->stockQuery($start_time, $end_time, $otherParams = []);

// 创建盘点开单
// ERP库存需要调整时，推送盘点库存单据给ERP 注：ERP盘点成功后，盘点单内的库存值直接覆盖前库存
$stock->stockSyncByPd($warehouse_no, $is_adjust_stock, $goods_list, $otherParams = []);

// 查询盘点单
// 获取调整ERP库存的盘点单据信息 注：ERP盘点成功后，盘点单内的库存值直接覆盖前库存
$stock->stockPdOrderQuery($otherParams = []);

// 创建其他入库单
$stock->stockinOrderPush($stockin_info);

// 查询入库单管理
$stock->stockinOrderQuery($start_time, $end_time, $otherParams = []);

// 创建其他出库单
$stock->stockoutOrderPush($stockout_info);

// 查询出库单管理
$stock->stockoutOrderQuery($start_time, $end_time, $otherParams = []);

// 创建调拨单
// ERP内仓与仓之间的库存需要调度时，推送调拨单给ERP
$stock->stockTransferPush($transfer_info);

// 创建调拨出库单
// ERP调拨业务走到出库步骤时，推送调拨出库单给ERP
$stock->stockoutTransferPush($stockout_info);

// 创建调拨入库单
// ERP调拨业务中发货仓库出库完成，收货仓库需要入库单前推送调拨入库单给ERP
$stock->stockinTransferPush($stockin_info);

// 查询调拨单信息
// 获取ERP的调拨单据信息
$stock->stockTransferQuery($start_time, $end_time, $otherParams = []);

```

> 订单类
```php
<?php
// 1. 推送销售订单给ERP
// 2. 更新已推送成功的销售订单
$trade->tradePush($trade_list, $shop_no, $switch = 0);

// 获取ERP的销售订单信息
$trade->tradeQuery($start_time, $end_time, $otherParams = []);

// 获取ERP销售订单的出库单信息 查询销售出库单
$trade->stockoutOrderQueryTrade($start_time, $end_time, $otherParams = []);

// ERP销售订单的发货状态、物流单号等同步给其他系统。
// 注：”查询物流同步”与“物流同步回写”两个接口配合使用，完成“销售订单发货同步”
// 查询物流同步
$trade->logisticsSyncQuery($limit, $shop_no = '', $is_part_sync_able = -1);

// 同步发货状态、物流单号给平台是否成功的状态回传给ERP
// 物流同步回写
$trade->logisticsSyncAck($logistics_list);

// 获取变化后的ERP可销库存，并同步至平台店铺
// 注：”查询同步库存”与“库存同步回写”两个接口配合使用，完成“库存同步”
// 查询同步库存
$trade->apiGoodsStockChangeQuery($shop_no, $limit);

// 库存量同步至平台是否成功的状态回传给ERP
// 库存同步回写
$trade->apiGoodsStockChangeAck($stock_sync_list);

```

## License

MIT