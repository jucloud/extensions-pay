<?php

namespace JuCloud\Extensions\Pay\Gateways\Wechat;

use JuCloud\Extensions\Pay\Exceptions\GatewayException;
use JuCloud\Extensions\Pay\Exceptions\InvalidArgumentException;
use JuCloud\Extensions\Pay\Exceptions\InvalidSignException;
use JuCloud\Extensions\Pay\Gateways\Wechat;
use JuCloud\Extensions\Supports\Collection;

class MiniappGateway extends MpGateway
{
    /**
     * Pay an order.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param string $endpoint
     *
     * @throws GatewayException
     * @throws InvalidArgumentException
     * @throws InvalidSignException
     */
    public function pay($endpoint, array $payload): Collection
    {
        $payload['appid'] = Support::getInstance()->miniapp_id;

        if (Wechat::MODE_SERVICE === $this->mode) {
            $payload['sub_appid'] = Support::getInstance()->sub_miniapp_id;
            $this->payRequestUseSubAppId = true;
        }

        return parent::pay($endpoint, $payload);
    }
}
