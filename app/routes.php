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

Macaw::dispatch();