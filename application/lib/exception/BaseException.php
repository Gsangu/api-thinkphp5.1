<?php
/**
 * Created by Gsan.
 * Date: 2017/9/14
 * Time: 17:12
 */

namespace app\lib\exception;

use think\exception\Handle;

class BaseException extends Handle
{
    public function __construct($params = [])
    {
        if (!is_array($params)) {
            exception('参数必须是数组');
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }
        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
        if(is_array($this->msg)){
            $all = implode(',',$this->msg);
            $this->msg = $all;
        }
        $this->message = $this->msg;
    }

    // HTTP 状态码  404，200....
    public $code = 400;

    // 错误具体信息
    public $msg = "参数错误";

    // 自定义错误码
    public $errorCode = 10000;


}