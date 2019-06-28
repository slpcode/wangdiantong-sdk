<?php

namespace Slpcode\WangDianTongSdk;


use Hanson\Foundation\Foundation;

/**
 * @property \Slpcode\WangDianTongSdk\Trade\Trade $trade
 * @property \Slpcode\WangDianTongSdk\Goods\Goods $goods
 *
 * Class WangDianTong
 * @package Slpcode\WangDianTongSdk
 */
class WangDianTongSdk extends Foundation
{
    protected $providers = [
        ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }
}