<?php
namespace Zxf5115\Laravel\Basic\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 响应消息静态代理类
 */
class MessageFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'Message';
  }
}
