<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-10T20:25:42+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: index.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-22T10:04:28+08:00
# @License: MIT
# @Copyright: 2017

header("Access-Control-Allow-Origin: http://127.0.0.1:9090");
header("Access-Control-Allow-Credentials: true");
date_default_timezone_set('Asia/Shanghai');
session_start();
$group = SIfGet('g');
if($group === NULL || !is_dir(__DIR__ . "/$group"))
{
    // TODO 写入debug日志
    $group = 'index';
}
// 如果不存在该组，拒绝访问
if(!is_dir(__DIR__ . "/$group")) {
    Ajax(401, "g请求错误");
}

// 获得类名
$class = SGet('m');
// 获得动作
$method = SGet('a');
if(!is_file(__DIR__ . "/$group/$class.class.php")) {
    Ajax(401, "m请求错误-0");
}
require(__DIR__ . "/autoload.php");
require(__DIR__ . "/$group/$class.class.php");
$alias_class = "\\App\\$group\\$class";
if(class_exists($alias_class) === FALSE) {
    Ajax(401, "m请求错误-1");
}
$handle = new $alias_class();
if(method_exists($handle, $method) === FALSE) {
    Ajax(401, "a请求错误-0");
}
// 执行相应操作
$handle->$method();
