<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-10T20:05:23+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: Common.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-17T23:20:07+08:00
# @License: MIT
# @Copyright: 2017

/**
 * 通过Get参数获取Get值
 * @param string $param Get参数
 * @return mixed Get参数值，如果不存在则返回NULL
 */
function SIfGet($param) {
    // echo $param;
    // 判断给定的Get参数名是否有值，若没有，则返回空
    // 判断给定的字符串内容是否有GET参数并且不为空
    if(isset($_GET[$param]) == 1 && !empty($_GET[$param])) return $_GET[$param];

    // 如果不存在返回NULL
    return NULL;
}

/**
 * 通过Get参数获取值
 * @param string $param Get参数
 * @return string Get参数值，如果没有则直接退出程序
 */
function SGet($param) {
    if($val = SIfGet($param)) {
        return $val;
    }
    else {
        Ajax(401, "GET参数${param}缺失");
    }
}

/**
 * 通过POST参数获取值
 * @param string $param POST参数
 * @return mixed POST参数，若没有返回NULL
 */
function SIfPost($param) {
    // 判断给定的POST参数是否有值，若没有，则返回空
    // 判断给定的字符串内容是否有POST参数并且不为空
    if(isset($_POST[$param]) && !empty($_POST[$param])) return $_POST[$param];

    // 如果不存在，则返回NULL
    return NULL;
}

/**
 * 通过POST参数获取值
 * @param string $param Post参数
 * @return string Post参数值，若不存在则直接退出程序
 */
function SPost($param) {
    if($val = SIfPost($param)) {
        return $val;
    }
    else {
        Ajax(401, "POST参数${param}缺失");
    }
}

/**
 * JsonEncode
 * @param string $arr 需要json编码的数组
 * @param bool $pretty 是否需要美化
 * @return string 返回json编码后的字符串
 */
function SJsonEncode($arr, $pretty = false) {
    $options = JSON_UNESCAPED_UNICODE;
    if($pretty) $options |= JSON_PRETTY_PRINT;
    // json编码
    $data = json_encode($arr, $options);
    return $data;
}

/**
 * 返回JSON内容
 * @param int $code   错误代码
 * @param mixed $detail 细节内容
 */
function Ajax($code, $detail = "") {
    global $STATUS_CODES;
    header('Content-type:application/json;charset=utf-8');
    $res = NULL;
    if(isset($STATUS_CODES[$code])) {
        $res = [
            'code' => $code,
            'message' => $STATUS_CODES[$code]
        ];
        if(empty($detail) === FALSE) $res['detail'] = $detail;
    }
    else {
        // TODO 发送错误邮件
        $res = array(
            'code' => 0,
            'message' => $STATUS_CODES[$code]
        );
    }
    echo SJsonEncode($res);
    exit(0);
}
