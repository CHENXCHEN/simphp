<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-10T19:48:48+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: index.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-18T22:09:31+08:00
# @License: MIT
# @Copyright: 2017

/**
 * 自动加载驱动
 * @param  [type] $classname [description]
 * @return [type]            [description]
 */
function _AUTO_LOAD_DRIVER($classname) {
    $classname = str_replace("\\", "/", $classname);
    $file = dirname(__DIR__) . "/$classname.class.php";
    if(is_file($file)) {
        require($file);
    }
}

spl_autoload_register('_AUTO_LOAD_DRIVER');

/**
 * 自动加载各个驱动的autoload
 */
function _AUTO_LOAD_DRIVER_AUTOLOAD() {
    global $DIRVER_AUTOLOAD;
    foreach ($DIRVER_AUTOLOAD as $value) {
        $file = __DIR__ . "/$value/autoload.php";
        if(is_file($file)) {
            require($file);
        }
    }
}

_AUTO_LOAD_DRIVER_AUTOLOAD();
