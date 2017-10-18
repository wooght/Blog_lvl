<?php

// @description 本地化服务
// @description Factory bind zh_CN
// @author wooght

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //系统引导  本次运行系统 string类型长度为191
        Schema::defaultStringLength(191);
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
