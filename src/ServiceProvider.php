<?php
namespace Curder\LaravelAliyunSms;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class ServiceProvider extends LServiceProvider
{
    public function boot()
    {
        $source = realpath(__DIR__.'/config.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('aliyunsms.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('aliyunsms');
        }

        $this->mergeConfigFrom($source, 'aliyunsms');
    }
    public function register()
    {
        $this->app->bind(AliyunSms::class, function() {
            return new AliyunSms();
        });
    }
    protected function configPath()
    {
        return __DIR__ . '/config.php';
    }
}