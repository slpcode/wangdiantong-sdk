<?php

namespace Slpcode\WangDianTongSdk;


use Hanson\Foundation\Foundation;

/**
 * @property \Slpcode\WangDianTongSdk\Basic\Basic $basic
 * @property \Slpcode\WangDianTongSdk\Goods\Goods $goods
 * @property \Slpcode\WangDianTongSdk\Purchase\Purchase $purchase
 * @property \Slpcode\WangDianTongSdk\Refund\Refund $refund
 * @property \Slpcode\WangDianTongSdk\Stock\Stock $stock
 * @property \Slpcode\WangDianTongSdk\Trade\Trade $trade
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