<?php
namespace Tests;

require "../vendor/autoload.php";


use PHPUnit\Framework\TestCase;


class TestDemo extends TestCase
{

    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));   //断言相等

        array_push($stack, 'foo');     //数据压栈
        $this->assertEquals('foo', $stack[count($stack) - 1]);  //断言相等
        $this->assertEquals(1, count($stack));   //断言相等(数目)

        $this->assertEquals('foo', array_pop($stack));  //断言弹出时数据相等
        $this->assertEquals(0, count($stack));      //断言数目相等
    }
}
