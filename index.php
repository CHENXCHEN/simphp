<?php
# @Author: HuaChao Chen <chc>
# @Date:   2017-07-10T16:01:08+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: index.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-11T11:31:08+08:00
# @License: MIT
# @Copyright: 2017
# @descript: 入口文件

header("Content-type: text/html; charset=utf-8");
ini_set("display_errors", "On");
date_default_timezone_set("Asia/Chongqing");
require(__DIR__ . '/Lib/index.php');
require(__DIR__ . '/App/index.php');
