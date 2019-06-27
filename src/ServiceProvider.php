<?php
/**
 * Created by PhpStorm.
 * User: tanbin
 * Date: 2019/6/27
 * Time: 15:58
 */

namespace Slpcode\WangdiantongSdk;


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
        $pimple['order'] = function ($pimple) {
            $config = $pimple['config'];

            $appkey = $config->get('appkey');
            $appsecret = $config->get('appsecret');
            $sid = $config->get('sid');
            $baseUrl = $config->get('baseUrl');
            $shopNo = $config->get('shopNo');

            return new Order($appkey, $appsecret, $sid, $baseUrl, $shopNo);
        };
    }
}