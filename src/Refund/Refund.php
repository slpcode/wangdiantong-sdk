<?php
/**
 * Created by PhpStorm.
 * User: slpcode
 * Date: 2019/7/1
 * Time: 14:20
 */

namespace Slpcode\WangDianTongSdk\Refund;


use Slpcode\WangDianTongSdk\Api;

class Refund extends Api
{
    /**
     * 创建原始退款单
     *
     * @param $api_refund_list
     * @return mixed
     */
    public function salesRefundPush($api_refund_list)
    {
        $url = 'sales_refund_push.php';

        $params = [];
        $params['api_refund_list'] = json_encode($api_refund_list, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 创建销售退货入库单
     * 推送ERP销售退货（换货）订单对应的入库单据给ERP 推送前提ERP的退换单状态为“待收货”
     *
     * @param $stockin_refund_info
     * @return mixed
     */
    public function stockinRefundPush($stockin_refund_info)
    {
        $url = 'stockin_refund_push.php';

        $params = [];
        $params['stockin_refund_info'] = json_encode($stockin_refund_info, JSON_UNESCAPED_UNICODE);

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP销售退货（换货）订单信息 查询退换管理
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function refundQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'refund_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP销售退货（换货）订单对应的入库单信息 查询退货入库单管理
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function stockinOrderQueryRefund($start_time, $end_time, $otherParams = [])
    {
        $url = 'stockin_order_query_refund.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

}