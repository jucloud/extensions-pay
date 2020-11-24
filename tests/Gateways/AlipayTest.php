<?php

namespace JuCloud\Extensions\Pay\Tests\Gateways;

use Symfony\Component\HttpFoundation\Response;
use JuCloud\Extensions\Pay\Pay;
use JuCloud\Extensions\Pay\Tests\TestCase;

class AlipayTest extends TestCase
{
    public function testSuccess()
    {
        $success = Pay::alipay([])->success();

        $this->assertInstanceOf(Response::class, $success);
        $this->assertEquals('success', $success->getContent());
    }
}
