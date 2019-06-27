<?php
/**
 * Created by PhpStorm.
 * User: tanbin
 * Date: 2019/6/27
 * Time: 15:32
 */

namespace Slpcode\WangdiantongSdk;


class Order extends Api
{

    public function tradePush($trade_list, $switch = 0)
    {
        $url = $this->getBaseUrl().'/trade_push.php';

        $params = [
            'switch' => intval($switch), // 0 非严格模式 1 严格模式
            'shop_no' => $this->getShopNo(), // 店铺编号
            'trade_list' => json_encode($trade_list),
        ];

        return $this->request('post', $url, $params);
    }

    public function tradeQuery($start_time, $end_time, $otherParams = [])
    {
        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        $url = $this->getBaseUrl(). '/trade_query.php';

        return $this->request('post', $url, $params);
    }
}