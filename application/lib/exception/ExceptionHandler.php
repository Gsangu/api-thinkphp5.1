<?php
/**
 * Created by Gsan.
 * Date: 2017/9/14
 * Time: 17:09
 */

namespace app\lib\exception;


use think\exception\Handle;
use think\facade\Log;
use think\facade\Request;

/**
 * 异常处理类  在config/app.php 下配置exception_handle
 *
 * Class ExceptionHandler
 * @package app\lib\exception
 */
class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render(\Exception $e)
    {
//        $request = Request::instance();
//        $json = strtolower($request->header('content-type'));
        if ($e instanceof BaseException) {
            // 若是自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            $this->code = 500;
            $this->msg = config('app_debug') ? $e->getMessage() : '服务器内部错误';
            $this->errorCode = 999;
            // 写入日志
            $this->recordErrorLog($e);
        }
        $result = [
            'error_msg' => $this->msg,
            'error_code' => $this->errorCode,
//            'request_url' => $request->url()
        ];
        /*if ($request->isAjax() && $request->isPost() && $json != 'application/json' && config('app_debug')) {
            // 如果为直接浏览
            return parent::render($e);
        }*/
        return json($result, $this->code);
    }

    private function recordErrorLog(\Exception $e)
    {
        Log::init([
            'type' => 'File',
//            'path' => '',
            'level' => ['error']
        ]);
        Log::record($e->getMessage(), 'error');
    }
}