<?php
namespace Zxf5115\Laravel\Basic\Services;

use Response;

use App\Http\Constant\Code;

/**
 * 响应消息服务类
 */
class MessageService
{
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

    return Response::json([
      'status' => $code,
      'message' => $message ?: Code::message($code),
      'data' => $data
    ]);
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
    return Response::json([
      'status' => $code,
      'message' => Code::message($code)
    ]);
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
    return Response::json([
      'status'  => $code,
      'message' => $message
    ]);
  }
}
