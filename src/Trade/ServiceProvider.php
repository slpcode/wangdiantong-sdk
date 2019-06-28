<?php

namespace Slpcode\WangDianTongSdk\Trade;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

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
        $pimple['trade'] = function ($pimple) {
            $config = $pimple->getConfig();

            $appkey = $config['appkey'];
            $appsecret = $config['appsecret'];
            $sid = $config['sid'];
            $baseUrl = $config['baseUrl'];

            return new Trade($appkey, $appsecret, $sid, $baseUrl);
        };
    }
}