<?php
/**
 * 这里自定义全局调用的帮助函数
 */

/**
 * 打印并终结函数
 * @param $data
 */
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

/**
 * 打印并函数
 * @param $data
 */
function dump($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}