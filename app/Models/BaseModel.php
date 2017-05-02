<?php
namespace App\Models;

use Slim\PDO\Database;


/**
 * 基础model
 * Class BaseModel
 * @property Database model
 * @package App\Models
 */
class BaseModel
{
    private static $_instance;

    private static $dbConfig = [
        'dsn' => 'mysql:host=localhost;dbname=test;charset=utf8',
        'user' => 'root',
        'pwd' => 'root'
    ];

    //private标记的构造方法
    private function __construct()
    {
    }

    //创建__clone方法防止对象被复制克隆
    public function __clone()
    {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

    //单例方法,用于访问实例的公共的静态方法
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            $db = self::$dbConfig;
            self::$_instance = new Database($db['dsn'], $db['user'], $db['pwd']);
        }
        return self::$_instance;
    }

}
