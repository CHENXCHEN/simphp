<?php
# @Author: CHC
# @Date:   2017-07-16T22:48:19+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: autoload.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-17T17:35:36+08:00
# @License: MIT
# @Copyright: 2017

function __ErrorHandle($errno = 0 ,$errstr = 0 , $errfile = 0 ,$errline = 0)
{
    $earr = NULL;
    if($errno && $errfile)
    {
        $earr = array();
        $earr['type'] = $errno;
        $earr['message'] = $errstr;
        $earr['file'] = $errfile;
        $earr['line'] = $errline;
    }
    else
    {
        $earr = error_get_last();
    }
    if($earr != NULL)
    {
        print_r($earr);
    $x = debug_backtrace();
    print_r($x);
        // logger($earr,$earr['type']);
    }
    return TRUE;
}

// 设置错误句柄
set_error_handler('__ErrorHandle', E_ALL);

// 抑制错误
error_reporting (0);

// 注册捕获致命错误结束执行
register_shutdown_function('__ErrorHandle');
