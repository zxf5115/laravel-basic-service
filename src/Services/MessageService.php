<?php
namespace Zxf5115\Laravel\Basic\Services;

use App\Http\Constant\Code;

/**
 * 响应消息服务类
 */
class MessageService
{
  /**
   * 消息类型
   */
  protected static $_headers = [
    'content-type' => 'application/json'
  ];


  /**
   * @author zhangxiaofei [<1326336909@qq.com>]
   * @dateTime 2024-05-27
   *
   * 成功信息响应方法
   *
   * @param array $data 响应数据
   * @return 成功信息
   */
  public static function success($data = [], $message = '')
  {
    $code = Code::SUCCESS;

    // 如果是响应代码
    if(is_int($data) && $data != 0 && $data != 1)
    {
      $data = Code::message($data);
    }

    $response = \Response::json([
      'status' => $code,
      'message' => $message ?: Code::message($code),
      'data' => $data
    ]);

    return $response->withHeaders(self::$_headers);
  }


  /**
   * @author zhangxiaofei [<1326336909@qq.com>]
   * @dateTime 2024-05-27
   *
   * 错误信息响应方法
   *
   * @param integer $code 错误代码
   * @return 错误信息
   */
  public static function error($code = 1000)
  {
    $response = \Response::json([
      'status' => $code,
      'message' => Code::message($code)
    ]);

    return $response->withHeaders(self::$_headers);
  }


  /**
   * @author zhangxiaofei [<1326336909@qq.com>]
   * @dateTime 2024-05-27
   *
   * 自定义消息响应方法
   *
   * @param integer $code 错误代码
   * @return 错误信息
   */
  public static function message($message, $code = Code::MESSAGE)
  {
    $response = \Response::json([
      'status'  => $code,
      'message' => $message
    ]);

    return $response->withHeaders(self::$_headers);
  }
}
