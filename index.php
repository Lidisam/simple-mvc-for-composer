<?php


//引入自动加载文件
require "vendor/autoload.php";

// Eloquent ORM
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection(require './config/database.php');
$capsule->bootEloquent();

//引入路由
require "app/routes.php";




