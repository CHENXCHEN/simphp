<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-10T16:18:23+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: index.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-11T11:10:08+08:00
# @License: MIT
# @Copyright: 2017

/**
 * 按顺序分别载入:
 * 1. Config
 * 2. Common
 * 3. Driver
 */

require(__DIR__ . '/Config/Config.php');
require(__DIR__ . '/Common/Common.php');
require(__DIR__ . '/Driver/Driver.php');
