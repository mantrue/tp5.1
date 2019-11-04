<?php

namespace app\common\exception;

/**
 * 创建成功（如果不需要返回任何消息）
 * 201 创建成功，202需要一个异步的处理才能完成请求
 */
class SuccessMessage extends BaseException
{
    public $code = 200;
    public $message = 'ok';
    public $httpCode = 200;
}