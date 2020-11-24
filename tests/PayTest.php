<?php

namespace JuCloud\Extensions\Pay\Tests;

use JuCloud\Extensions\Pay\Contracts\GatewayApplicationInterface;
use JuCloud\Extensions\Pay\Exceptions\InvalidGatewayException;
use JuCloud\Extensions\Pay\Gateways\Alipay;
use JuCloud\Extensions\Pay\Gateways\Wechat;
use JuCloud\Extensions\Pay\Pay;

class PayTest extends TestCase
{
    public function testAlipayGateway()
    {
        $alipay = Pay::alipay(['foo' => 'bar']);

        $this->assertInstanceOf(Alipay::class, $alipay);
        $this->assertInstanceOf(GatewayApplicationInterface::class, $alipay);
    }

    public function testWechatGateway()
    {
        $wechat = Pay::wechat(['foo' => 'bar']);

        $this->assertInstanceOf(Wechat::class, $wechat);
        $this->assertInstanceOf(GatewayApplicationInterface::class, $wechat);
    }

    public function testFooGateway()
    {
        $this->expectException(InvalidGatewayException::class);
        $this->expectExceptionMessage('INVALID_GATEWAY: Gateway [foo] Not Exists');

        Pay::foo([]);
    }
}
