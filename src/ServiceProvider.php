<?php

namespace Slpcode\WangDianTongSdk;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slpcode\WangDianTongSdk\Goods\Goods;
use Slpcode\WangDianTongSdk\Trade\Trade;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        // 订单接口
        $pimple['trade'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new Trade($config['appkey'], $config['appsecret'], $config['sid'], $config['baseUrl']);
        };

        // 货品接口
        $pimple['goods'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new Goods($config['appkey'], $config['appsecret'], $config['sid'], $config['baseUrl']);
        };
    }
}