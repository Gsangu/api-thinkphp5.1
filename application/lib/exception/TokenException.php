<?php
/**
 * Created by Gsan.
 * Date: 2017/10/19
 * Time: 16:58
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token过期或无效';
    public $errorCode = 10001;
}