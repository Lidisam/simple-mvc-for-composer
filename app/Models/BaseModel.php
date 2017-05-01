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
    public static $model;
    public $dbConfig = [
        'dsn' => 'mysql:host=localhost;dbname=test;charset=utf8',
        'user' => 'root',
        'pwd' => 'root'
    ];

    function __construct()
    {
        if (empty(BaseModel::$model))
            BaseModel::$model = $this->returnModel();
    }

    public function returnModel()
    {
        $db = $this->dbConfig;
        return new Database($db['dsn'], $db['user'], $db['pwd']);
    }
}
