<?php
/**
 * Created by PhpStorm.
 * User: slpcode
 * Date: 2019/7/1
 * Time: 11:59
 */

namespace Slpcode\WangDianTongSdk\Stock;


use Slpcode\WangDianTongSdk\Api;

class Stock extends Api
{
    /**
     * 查询库存API
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'stock_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 创建盘点开单
     * ERP库存需要调整时，推送盘点库存单据给ERP 注：ERP盘点成功后，盘点单内的库存值直接覆盖前库存
     *
     * @param $warehouse_no
     * @param $is_adjust_stock
     * @param $goods_list
     * @param array $otherParams
     * @return mixed
     */
    public function stockSyncByPd($warehouse_no, $is_adjust_stock, $goods_list, $otherParams = [])
    {
        $url = 'stock_sync_by_pd.php';

        $params = [];
        $params['warehouse_no'] = $warehouse_no;
        $params['is_adjust_stock'] = $is_adjust_stock;
        $params['goods_list'] = json_encode($goods_list, JSON_UNESCAPED_UNICODE);

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 查询盘点单
     * 获取调整ERP库存的盘点单据信息 注：ERP盘点成功后，盘点单内的库存值直接覆盖前库存
     *
     * @param array $otherParams
     * @return mixed
     */
    public function stockPdOrderQuery($otherParams = [])
    {
        $url = 'stock_pd_order_query.php';

        $params = [];

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 创建其他入库单
     *
     * @param $stockin_info
     * @return mixed
     */
    public function stockinOrderPush($stockin_info)
    {
        $url = 'stockin_order_push.php';

        $params = [];
        $params['stockin_info'] = json_encode($stockin_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 查询入库单管理
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockinOrderQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockin_order_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 创建其他出库单
     *
     * @param $stockout_info
     * @return mixed
     */
    public function stockoutOrderPush($stockout_info)
    {
        $url = 'stockout_order_push.php';

        $params = [];
        $params['stockout_info'] = json_encode($stockout_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     *  查询出库单管理
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockoutOrderQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockout_order_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 创建调拨单
     * ERP内仓与仓之间的库存需要调度时，推送调拨单给ERP
     *
     * @param $transfer_info
     * @return mixed
     */
    public function stockTransferPush($transfer_info)
    {
        $url = 'stock_transfer_push.php';

        $params  =[];
        $params['transfer_info'] = json_encode($transfer_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 创建调拨出库单
     * ERP调拨业务走到出库步骤时，推送调拨出库单给ERP
     *
     * @param $stockout_info
     * @return mixed
     */
    public function stockoutTransferPush($stockout_info)
    {
        $url = 'stockout_transfer_push.php';

        $params = [];
        $params['stockout_info'] = json_encode($stockout_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 创建调拨入库单
     * ERP调拨业务中发货仓库出库完成，收货仓库需要入库单前推送调拨入库单给ERP
     *
     * @param $stockin_info
     * @return mixed
     */
    public function stockinTransferPush($stockin_info)
    {
        $url = 'stockin_transfer_push.php';

        $params = [];
        $params['stockin_info'] = json_encode($stockin_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 查询调拨单信息
     * 获取ERP的调拨单据信息
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockTransferQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'stock_transfer_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }
}