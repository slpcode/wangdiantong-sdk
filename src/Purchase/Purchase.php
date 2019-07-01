<?php
/**
 * Created by PhpStorm.
 * User: slpcode
 * Date: 2019/7/1
 * Time: 14:34
 */

namespace Slpcode\WangDianTongSdk\Purchase;


use Slpcode\WangDianTongSdk\Api;

class Purchase extends Api
{
    /**
     * 创建采购单
     *
     * @param $purchase_info
     * @return mixed
     */
    public function purchaseOrderPush($purchase_info)
    {
        $url = 'purchase_order_push.php';

        $params = [];
        $params['purchase_info'] = json_encode($purchase_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 推送采购单对应的入库单给ERP 创建采购入库单
     *
     * @param $purchase_info
     * @return mixed
     */
    public function stockinPurchasePush($purchase_info)
    {
        $url = 'stockin_purchase_push.php';

        $params = [];
        $params['purchase_info'] = json_encode($purchase_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP的采购单信息 查询采购单管理
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function purchaseOrderQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'purchase_order_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP采购单对应的入库单信息 查询采购入库单
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockinOrderQueryPurchase($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockin_order_query_purchase.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 推送采购退货单据给ERP 创建采购退货单
     *
     * @param $return_info
     * @return mixed
     */
    public function purchaseReturnPush($return_info)
    {
        $url = 'purchase_return_push.php';

        $params = [];
        $params['return_info'] = json_encode($return_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 推送采购退货单对应的出库单给ERP 创建采购退货出库单
     *
     * @param $purchase_return_info
     * @return mixed
     */
    public function purchaseReturnOrderPush($purchase_return_info)
    {
        $url = 'purchase_return_order_push.php';

        $params = [];
        $params['purchase_return_info'] = json_encode($purchase_return_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP的采购退货单信息 查询采购退货单
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function purchaseReturnQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'purchase_return_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 查询ERP中采购退货出库单信息 查询采购退货出库单
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockoutOrderQueryReturn($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockout_order_query_return.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }
}