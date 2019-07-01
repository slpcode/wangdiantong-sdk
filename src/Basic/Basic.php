<?php
/**
 * Created by PhpStorm.
 * User: slpcode
 * Date: 2019/7/1
 * Time: 13:53
 */

namespace Slpcode\WangDianTongSdk\Basic;


use Slpcode\WangDianTongSdk\Api;

class Basic extends Api
{
    /**
     * 查询店铺
     *
     * @param array $otherParams
     * @return mixed
     */
    public function shop($otherParams = [])
    {
        $url = 'shop.php';

        $params = [];

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 查询仓库详细信息
     *
     * @param array $otherParams
     * @return mixed
     */
    public function warehouseQuery($otherParams = [])
    {
        $url = 'warehouse_query.php';

        $params = [];

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 获取ERP的物流公司档案资料	查询物流
     *
     * @param array $otherParams
     * @return mixed
     */
    public function logistics($otherParams = [])
    {
        $url = 'logistics.php';

        $params = [];

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 查询供应商管理
     *
     * @param $column
     * @param array $otherParams
     * @return mixed
     */
    public function purchaseProviderQuery($column, $otherParams = [])
    {
        $url = 'purchase_provider_query.php';

        $params = [];
        $params['column'] = $column;

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }

    /**
     * 推送供应商档案资料给ERP	 创建供应商
     *
     * @param $provider_no
     * @param $provider_name
     * @param $min_purchase_num
     * @param $purchase_cycle_days
     * @param $arrive_cycle_days
     * @param array $otherParams
     * @return mixed
     */
    public function purchaseProviderCreate($provider_no, $provider_name, $min_purchase_num, $purchase_cycle_days, $arrive_cycle_days, $otherParams = [])
    {
        $url = 'purchase_provider_create.php';

        $params = [];
        $params['provider_no'] = $provider_no; // 供应商编号
        $params['provider_name'] = $provider_name; // 供应商名称
        $params['min_purchase_num'] = $min_purchase_num; // 最小采购量
        $params['purchase_cycle_days'] = $purchase_cycle_days; // 采购周期
        $params['arrive_cycle_days'] = $arrive_cycle_days; // 到货周期

        if (!empty($otherParams)) {
            $params = array_merge($params, $otherParams);
        }

        return $this->request('post', $url, $params);
    }
}