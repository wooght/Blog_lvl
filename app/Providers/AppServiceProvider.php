<?php

namespace App\Providers;

// @description 本地化服务
// @description Factory bind zh_CN
// @author wooght
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //引导供应商Factory 采用 zh_CN 的方式返回对象
      $this->app->bind(Generator::class, function () {
        return Factory::create('zh_CN');
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
