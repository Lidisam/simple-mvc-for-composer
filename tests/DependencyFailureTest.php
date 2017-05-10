<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

require "../vendor/autoload.php";


/**
 * 测试之间的依赖关系
 * Class DependencyFailureTest
 */
class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);   //如果改为false则会测试失败
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
        $this->assertTrue(false);  //该测试会依赖testOne,上面成功了则继续这个
    }
}
