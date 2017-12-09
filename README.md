## laravel-aliyun-sms

阿里云短信服务Laravel/Lumen适配，基于api V20170525版本。

阿里云短信服务地址接入流程：https://help.aliyun.com/document_detail/55288.html?spm=5176.sms-account.109.10.56907c16jbje4H

## Install

```
composer require fxm5547/laravel-aliyun-sms
```

## Config
### 在Laravel项目的`.env`文件中配置如下信息。
```
ALIYUN_SMS_ENABLE_HTTP_PROXY=false
ALIYUN_SMS_HTTP_PROXY_IP=127.0.0.1
ALIYUN_SMS_HTTP_PROXY_PORT=8888
ALIYUN_SMS_REGION_ID=cn-hangzhou
ALIYUN_SMS_AK=""
ALIYUN_SMS_AS=""
ALIYUN_SMS_SIGN_NAME=""
```

### 注册ServiceProvide
#### Laravel
在项目的`config/app.php`文件中`providers`数组中新增如下行：
```
Curder\LaravelAliyunSms\ServiceProvider::class,
```
#### Lumen
在项目的`config/app.php`文件中新增如下行：
```
$app->register(Curder\LaravelAliyunSms\ServiceProvider::class);
```

### 生成配置文件
```
php artisan vendor:publish --provider="Curder\LaravelAliyunSms\ServiceProvider"
```
生成的文件在`config/aliyunsms.php`，可以前往修改。

## How to use ?
```
$smsService = App::make(Curder\LaravelAliyunSms\AliyunSms::class);
$smsService->send(strval($mobile), $tplId , $params);
```
> 接受的参数分别是：
> * string $mobile -> 短信接受手机号
> * string $tplId  -> 模板签名id，需要在阿里云后台申请，并通过审核才可以使用
> * array $params  -> 发送参数