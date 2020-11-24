<h1 align="center">Pay</h1>

<p align="center">

</p>

JuCloud Pay是一个基于<a href="https://github.com/yansongda/pay" target="_blank">yansongda/pay</a>二次开发而成的支付工具，在整合了支付宝、微信支付之外扩展了通联支付。

**！！请先熟悉 支付宝/微信 说明文档！！请具有基本的 debug 能力！！**

欢迎 Star，欢迎 PR！

## 特点
- 丰富的事件系统
- 命名不那么乱七八糟
- 隐藏开发者不需要关注的细节
- 根据支付宝、微信最新 API 开发而成
- 高度抽象的类，免去各种拼json与xml的痛苦
- 符合 PSR 标准，你可以各种方便的与你的框架集成
- 文件结构清晰易理解，可以随心所欲添加本项目中没有的支付网关
- 方法使用更优雅，不必再去研究那些奇怪的的方法名或者类名是做啥用的


## 运行环境
- PHP 7.0+ (v2.8.0 开始 >= 7.1.3)
- composer

## 支持的支付方法
### 1、支付宝
- 电脑支付
- 手机网站支付
- APP 支付
- 刷卡支付
- 扫码支付
- 账户转账
- 小程序支付

|  method   |   描述       |
| :-------: | :-------:   |
|  web      | 电脑支付     |
|  wap      | 手机网站支付 |
|  app      | APP 支付    |
|  pos      | 刷卡支付  |
|  scan     | 扫码支付  |
|  transfer | 帐户转账  |
|  mini     | 小程序支付 |

### 2、微信
- 公众号支付
- 小程序支付
- H5 支付
- 扫码支付
- 刷卡支付
- APP 支付
- 企业付款
- 普通红包
- 分裂红包

| method |   描述     |
| :-----: | :-------: |
| mp      | 公众号支付  |
| miniapp | 小程序支付  |
| wap     | H5 支付    |
| scan    | 扫码支付    |
| pos     | 刷卡支付    |
| app     | APP 支付  |
| transfer     | 企业付款 |
| redpack      | 普通红包 |
| groupRedpack | 分裂红包 |

## 支持的方法
所有网关均支持以下方法

- find(array/string $order)  
说明：查找订单接口  
参数：`$order` 为 `string` 类型时，请传入系统订单号，对应支付宝或微信中的 `out_trade_no`； `array` 类型时，参数请参考支付宝或微信官方文档。  
返回：查询成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据。  
异常：`GatewayException` 或 `InvalidSignException`  

- refund(array $order)  
说明：退款接口  
参数：`$order` 数组格式，退款参数。  
返回：退款成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据。  
异常：`GatewayException` 或 `InvalidSignException`

- cancel(array/string $order)  
说明：取消订单接口  
参数：`$order` 为 `string` 类型时，请传入系统订单号，对应支付宝或微信中的 `out_trade_no`； `array` 类型时，参数请参考支付宝或微信官方文档。    
返回：取消成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据。  
异常：`GatewayException` 或 `InvalidSignException`

- close(array/string $order)  
说明：关闭订单接口  
参数：`$order` 为 `string` 类型时，请传入系统订单号，对应支付宝或微信中的 `out_trade_no`； `array` 类型时，参数请参考支付宝或微信官方文档。  
返回：关闭成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据。  
异常：`GatewayException` 或 `InvalidSignException`  

- verify()  
说明：验证服务器返回消息是否合法  
返回：验证成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据。  
异常：`GatewayException` 或 `InvalidSignException`  

- PAYMETHOD(array $order)  
说明：进行支付；具体支付方法名称请参考「支持的支付方法」一栏  
返回：成功，返回 `JuCloud\Core\Supports\Collection` 实例，可以通过 `$colletion->xxx` 或 `$collection['xxx']` 访问服务器返回的数据或 `Symfony\Component\HttpFoundation\Response` 实例，可通过 `return $response->send()`(laravel 框架中直接 `return $response`) 返回，具体请参考文档。  
异常：`GatewayException` 或 `InvalidSignException`  

## 安装
```shell
composer require jucloud/extensions-pay -vvv
```

## 使用说明

### 支付宝
```php

```

### 微信
```php

```

## 错误
如果在调用相关支付网关 API 时有错误产生，会抛出 `GatewayException`,`InvalidSignException` 错误，可以通过 `$e->getMessage()` 查看，同时，也可通过 `$e->raw` 查看调用 API 后返回的原始数据，该值为数组格式。

### 所有异常

* JuCloud\Core\Pay\Exceptions\InvalidGatewayException ，表示使用了除本 SDK 支持的支付网关。
* JuCloud\Core\Pay\Exceptions\InvalidSignException ，表示验签失败。
* JuCloud\Core\Pay\Exceptions\InvalidConfigException ，表示缺少配置参数，如，`ali_public_key`, `private_key` 等。
* JuCloud\Core\Pay\Exceptions\GatewayException ，表示支付宝/微信服务器返回的数据非正常结果，例如，参数错误，对账单不存在等。


## 代码贡献
由于测试及使用环境的限制，本项目中只开发了「支付宝」和「微信支付」的相关支付网关。

如果您有其它支付网关的需求，或者发现本项目中需要改进的代码，**_欢迎 Fork 并提交 PR！_**

## LICENSE
MIT
