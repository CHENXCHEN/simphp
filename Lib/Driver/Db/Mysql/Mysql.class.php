<?php
# @Author: HuaChao Chen <CHC>
# @Date:   2017-07-11T16:29:22+08:00
# @Email:  chenhuachaoxyz@gmail.com
# @Filename: Mysql.class.php
# @Last modified by:   CHC
# @Last modified time: 2017-07-17T17:15:39+08:00
# @License: MIT
# @Copyright: 2017

namespace Driver\Db\Mysql;

/**
 * Mysql 操作类
 * __construct($dsn, $username, $passwd, $option)
 */
class Mysql extends \PDO {
    /**
     * 保存dpo实例
     * @var \PDO
     */
    private static $db = NULL;

    /**
     * 构造函数
     * @param string $dsn      驱动信息
     * @param string $username 用户名
     * @param string $passwd   密码
     * @param array  $option   配置信息
     */
    public function __construct($dsn, $username, $passwd, $option) {
        // have a look at http://www.php.net/manual/en/pdo.constants.php
        $pre_option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_STATEMENT_CLASS => array('\Driver\Db\Mysql\MyPDOStatement', array()),
        ];

        $option = array_merge($option, $pre_option);
        parent::__construct($dsn, $username, $passwd, $option);
        return $this;
    }
}

/**
 * 继承自PDOStatement，给Prepare的执行操作加个钩子
 */
class MyPDOStatement extends \PDOStatement
{
    /**
     * __construct 构造函数
     */
    protected function __construct()
    {
        // need this empty construct()!
    }

    /**
     * 执行prepare语句
     * @param  array  $values 需要执行的prepare语句中的值
     * @return bool   成功返回TRUE，失败返回FALSE
     */
    public function execute($values=array())
    {
        $this->_debugValues = $values;
        try {
            $t = parent::execute($values);
            // TODO: logger
        } catch (\PDOException $e) {
            // TODO: logger
            throw $e;
        }

        return $t;
    }
}
