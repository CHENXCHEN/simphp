<?php
# @Author: CHC
# @Date:   2017-07-16T22:38:36+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: Error.class.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-18T22:11:17+08:00
# @License: MIT
# @Copyright: 2017

function __ErrorHandle($errno = 0 ,$errstr = 0 , $errfile = 0 ,$errline = 0, $err = array())
{
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
        // logger($earr,$earr['type']);
    }
    return TRUE;
}

// 设置错误句柄
$status = set_error_handler('__ErrorHandle',E_ALL);
