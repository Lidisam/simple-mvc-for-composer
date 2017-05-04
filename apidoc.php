<?php
//引入自动加载文件
// https://packagist.org/packages/crada/php-apidoc
require "vendor/autoload.php";

use Crada\Apidoc\Builder;
use Crada\Apidoc\Exception;

$classes = array(   //输入对应url
    'App\Controllers\HomeController'
);

$output_dir = __DIR__ . '/apidocs';
$output_file = 'api.html'; // defaults to index.html

try {
    $builder = new Builder($classes, $output_dir, 'api 文档', $output_file);
    $builder->generate();
} catch (Exception $e) {
    echo 'There was an error generating the documentation: ', $e->getMessage();
}
