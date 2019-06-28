<?php

namespace Slpcode\WangDianTongSdk\Goods;


use Slpcode\WangDianTongSdk\Api;

class Goods extends Api
{
    /**
     * 创建货品档案
     *
     * @param $goods_list
     * @return mixed
     */
    public function goodsPush($goods_list)
    {
        $url = 'goods_push.php';

        $params = [
            'goods_list' => json_encode($goods_list, JSON_UNESCAPED_UNICODE)
        ];

        return $this->request('post', $url, $params);
    }

    /**
     * 查询货品档案
     *
     * @param $start_time
     * @param $end_time
     * @param array $otherParams
     * @return mixed
     */
    public function goodsQuery($start_time, $end_time, $otherParams = [])
    {
        $url = 'goods_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 创建平台货品
     *
     * @param $platform_id
     * @param $shop_no
     * @param $goods_list
     * @return mixed
     */
    public function apiGoodsspecPush($platform_id, $shop_no, $goods_list)
    {
        $url = 'api_goodsspec_push.php';

        $api_goods_info = [
            'platform_id' => $platform_id,
            'shop_no' => $shop_no,
            'goods_list' => $goods_list,
        ];

        $params = [
            'api_goods_info' => json_encode($api_goods_info, JSON_UNESCAPED_UNICODE),
        ];

        return $this->request('post', $url, $params);
    }

    /**
     * 查询组合装
     *
     * @param $start_time
     * @param $end_time
     * @param $suite_no
     * @param array $otherParams
     * @return mixed
     */
    public function suitesQuery($start_time, $end_time, $suite_no, $otherParams = [])
    {
        $url = 'suites_query.php';

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;
        $params['suite_no'] = $suite_no;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }
}