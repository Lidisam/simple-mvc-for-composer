<?php
// PHP错误报告  0:关闭所有，-1：显示所有错误
error_reporting(-1);


//引入自动加载文件
require "vendor/autoload.php";

// 引入Eloquent ORM
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection(require './config/database.php');
$capsule->bootEloquent();

//引入路由
require "app/routes.php";





