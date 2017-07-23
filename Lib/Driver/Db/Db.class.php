<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-11T16:24:14+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: Db.class.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-18T22:10:15+08:00
# @License: MIT
# @Copyright: 2017

namespace Driver\Db;

/**
 * 数据库汇总类
 */
class Db {
    /**
     * 构造函数
     */
    protected function __construct() {

    }

    /**
     * 保存mysql连接信息
     * @var array
     */
    public static $mysql = [];
    /**
     * mysql
     * @param array $config 连接配置信息
     * @param array $option PDO连接配置信息
     * @return \Driver\Db\Mysql\Mysql 与$config相匹配的唯一实例，如果失败则返回NULL
     */
    public static function getMysql($config = array(), $option = array()) {
        // $check = !isset($config['host']) || !isset($config['username']) || !isset($config['password']) || !isset($config['dbname']) || !isset($config['charset']);
        $check = isset($config['host'], $config['username'], $config['password'], $config['dbname'], $config['charset'], $config['port']);
        if(!$check) {
            // TODO: logger or throw exception
            return NULL;
        }
        $dsn = sprintf("mysql: host=%s;port=%s;dbname=%s;charset=%s", $config['host'], $config['port'], $config['dbname'], $config['charset']);
        $unique_id = sprintf("%s;username=%s", $dsn, $config['username']);
        // 如果没有创建这个实例
        if(isset(self::$mysql[$unique_id]) === false) {
            $handle = new Mysql\Mysql($dsn, $config['username'], $config['password'], $option);
            self::$mysql[$unique_id] = $handle;
            return $handle;
        }
        else {
            return self::$mysql[$unique_id];
        }
    }
}
