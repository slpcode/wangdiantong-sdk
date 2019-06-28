<?php

namespace Slpcode\WangDianTongSdk\Trade;


use Slpcode\WangDianTongSdk\Api;

class Trade extends Api
{

    /**
     * 1. 推送销售订单给ERP
     * 2. 更新已推送成功的销售订单
     *
     * @param $trade_list
     * @param $shop_no
     * @param int $switch
     * @return mixed
     */
    public function tradePush($trade_list, $shop_no, $switch = 0)
    {
        $url = 'trade_push.php';

        $params = [
            'switch' => intval($switch), // 0 非严格模式 1 严格模式
            'shop_no' => $shop_no, // 店铺编号
            'trade_list' => json_encode($trade_list, JSON_UNESCAPED_UNICODE),
        ];

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP的销售订单信息
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function tradeQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'trade_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockoutOrderQueryTrade($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockout_order_query_trade.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * @param $limit
     * @param bool $shop_no
     * @param int $is_part_sync_able
     * @return mixed
     */
    public function logisticsSyncQuery($limit, $shop_no = '', $is_part_sync_able = -1)
    {
        $url = 'logistics_sync_query.php';

        $params = [
            'limit' => $limit,
        ];

        // 如果传递的是布尔值，并且true
        if ($shop_no) {
            $params['shop_no'] = $shop_no;
        }

        if (in_array($is_part_sync_able, [0, 1])) {
            // 没有对应需求的卖家请不要传该字段
            $params['is_part_sync_able'] = $is_part_sync_able;
        }

        return $this->request('post', $url, $params);
    }

    /**
     * @param $logistics_list
     * @return mixed
     */
    public function logisticsSyncAck($logistics_list)
    {
        $url = 'logistics_sync_ack.php';

        $params = [
            'logistics_list' => json_encode($logistics_list, JSON_UNESCAPED_UNICODE),
        ];

        return $this->request('post', $url, $params);
    }

    /**
     * @param $shop_no
     * @param $limit
     * @return mixed
     */
    public function apiGoodsStockChangeQuery($shop_no, $limit)
    {
        $url = 'api_goods_stock_change_query.php';

        $params = [
            'shop_no' => $shop_no,
            'limit' => $limit
        ];

        return $this->request('post', $url, $params);
    }

    public function apiGoodsStockChangeAck($stock_sync_list)
    {
        $url = 'api_goods_stock_change_ack.php';

        $params = [
            'stock_sync_list' => json_encode($stock_sync_list, JSON_UNESCAPED_UNICODE),
        ];

        return $this->request('post', $url, $params);
    }
}