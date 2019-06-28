<?php

namespace Slpcode\WangDianTongSdk;


use Hanson\Foundation\AbstractAPI;
use Psr\Http\Message\ResponseInterface;

class Api extends AbstractAPI
{
    protected $_appkey;
    protected $_appsecret;
    protected $_sid;
    protected $_shopNo;
    protected $_baseUrl;

    /**
     * Api constructor.
     * @param $appkey
     * @param $appsecret
     * @param $sid
     * @param $baseUrl
     */
    public function __construct($appkey, $appsecret, $sid, $baseUrl)
    {
        $this->_appkey = $appkey;
        $this->_appsecret = $appsecret;
        $this->_sid = $sid;
        $this->_baseUrl = $baseUrl;
    }

    public function request($method, $url, $params)
    {
        $http = $this->getHttp();

        $params = array_merge($this->systemParams(), $params);
        $params['sign'] = $this->sign($params);

        $baseUrl = Helper::finish($this->getBaseUrl(), '/');

        $link = $baseUrl . $url;

        /** @var ResponseInterface $response */
        $response = call_user_func_array([$http, $method], [$link, $params]);

        return json_decode(strval($response->getBody()), true);
    }

    /**
     * 生成签名
     * @param array $request_params
     * @return string
     */
    public function sign(array $request_params)
    {
        $sign = md5($this->pack($request_params) .$this->getAppsecret());
        return $sign;
    }

    /**
     * 参数打包
     * @param array $request_params
     * @return mixed
     */
    private function pack(array $request_params)
    {
        ksort($request_params);
        $arr = [];
        foreach ($request_params as $key => $val) {
            if ($key == 'sign') {
                continue;
            }
            if (count($arr)) {
                $arr[] = ';';
            }
            $arr[] = sprintf("%02d", iconv_strlen($key, 'UTF-8'));//键key的长度用2位数字表示
            $arr[] = '-';
            $arr[] = $key;
            $arr[] = ':';

            $arr[] = sprintf("%04d", iconv_strlen($val, 'UTF-8'));//值value的长度用4位数字表示
            $arr[] = '-';
            $arr[] = $val;
        }
        return implode('', $arr);
    }

    /**
     * 系统级别参数，不包含sign字段
     * @return array
     */
    protected function systemParams()
    {
        return [
            'sid' => $this->getSid(),
            'appkey' => $this->getAppkey(),
            'timestamp' => time()
        ];
    }

    /**
     * @return mixed
     */
    public function getAppsecret()
    {
        return $this->_appsecret;
    }

    /**
     * @param mixed $appsecret
     */
    public function setAppsecret($appsecret)
    {
        $this->_appsecret = $appsecret;
    }

    /**
     * @return mixed
     */
    public function getAppkey()
    {
        return $this->_appkey;
    }

    /**
     * @param mixed $appkey
     */
    public function setAppkey($appkey)
    {
        $this->_appkey = $appkey;
    }

    /**
     * @return mixed
     */
    public function getSid()
    {
        return $this->_sid;
    }

    /**
     * @param mixed $sid
     */
    public function setSid($sid)
    {
        $this->_sid = $sid;
    }

    /**
     * @param bool $autoAppendCommonPath
     * @return mixed
     */
    public function getBaseUrl($autoAppendCommonPath = true)
    {
        if ($autoAppendCommonPath) {
            return Helper::finish($this->_baseUrl, '/') . 'openapi2';
        }
        return $this->_baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->_baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getShopNo()
    {
        return $this->_shopNo;
    }

    /**
     * @param string $shopNo
     */
    public function setShopNo($shopNo)
    {
        $this->_shopNo = $shopNo;
    }
}