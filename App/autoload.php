<?php
# @Author: HuaChao Chen
# @Date:   2017-07-16T21:52:01+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: autoload.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-18T22:09:41+08:00
# @License: MIT
# @Copyright: 2017

function _AUTO_LOAD_APPS($classname) {
    $classname = str_replace("\\", "/", $classname);
    $filename = dirname(__DIR__) . "/${classname}.class.php";
    if(is_file($filename)) {
        require($filename);
    }
}

spl_autoload_register('_AUTO_LOAD_APPS');
