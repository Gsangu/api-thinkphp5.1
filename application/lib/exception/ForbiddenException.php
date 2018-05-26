<?php
/**
 * Created by Gsan.
 * Date: 2017/10/20
 * Time: 11:31
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = "无权限访问";
    public $errorCode = 10001;
}