<?php
namespace Zxf5115\Laravel\Basic\Providers;

use Illuminate\Support\ServiceProvider;

use Zxf5115\Laravel\Basic\Services\MessageService;

/**
 * 消息服务提供器类
 */
class MessageServiceProvider extends ServiceProvider
{
  /**
   * 如果延时加载，$defer 必须设置为 true
   */
  protected $defer = true;

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    // 注册单例服务
    $this->app->singleton('Message', function($app){
        return new MessageService;
    });

    // 设置别名
    $this->app->alias('Message', MessageService::class);
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {

  }


  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return ['upload', MessageService::class];
  }
}
