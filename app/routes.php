<?php
/**
 * 路由
 * using:https://packagist.org/packages/codingbean/macaw
 */
use \NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'App\Controllers\HomeController@home');
// Macaw::get('/', function() {
//   echo 'Hello world!';
// });
//测试api控制器
Macaw::post('/test', 'App\Controllers\HomeController@test');

// 钩子使用演示
Macaw::get('/hook', 'App\Controllers\HomeController@hook_demo');


Macaw::dispatch();