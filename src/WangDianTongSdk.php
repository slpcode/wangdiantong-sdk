<?php
/**
 * Created by PhpStorm.
 * User: tanbin
 * Date: 2019/6/27
 * Time: 15:30
 */

namespace Slpcode\WangDianTongSdk;


use Hanson\Foundation\Foundation;

/**
 * @property \Slpcode\WangDianTongSdk\Trade\Trade $trade
 *
 * Class WangDianTong
 * @package Slpcode\WangDianTongSdk
 */
class WangDianTongSdk extends Foundation
{
    protected $providers = [
        \Slpcode\WangDianTongSdk\Trade\ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }
}