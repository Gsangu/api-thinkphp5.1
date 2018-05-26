<?php
/**
 * Created by Gsan.
 * Date: 2017/11/15
 * Time: 21:16
 */

namespace app\lib\exception;


class ResourceException extends BaseException
{
    public $code = 404;
    public $msg = '资源不存在';
    public $errorCode = 80000;
}