<?php
namespace Zxf5115\Laravel\Basic\Constant;

/**
 * @author zhangxiaofei [<1326336909@qq.com>]
 * @dateTime 2024-05-27
 *
 * 错误代码常量类
 */
class Code
{
  // 公共错误
  const SUCCESS = 200;
  const ERROR = 1000;
  const CUSTOM_MESSAGE = 1001;

  public static $message = [
    self::SUCCESS => '成功',
    self::ERROR => '未知错误',
    self::CUSTOM_MESSAGE => '自定义消息',
  ];


  /**
   * @author zhangxiaofei [<1326336909@qq.com>]
   * @dateTime 2021-04-16
   *
   * 组装Code对应显示内容
   *
   * @param int $code 信息代码
   * @return 信息内容
   */
  public static function message($code)
  {
    return self::$message[$code] ?: self::$message[self::ERROR];
  }
}
