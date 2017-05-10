<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

require "../vendor/autoload.php";


/**
 * 数据供给器
 */
class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);   //前面是期待的结果，后面为计算过程
    }

    public function additionProvider()
    {
        return [
            'adding zeros' => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one' => [1, 1, 3]      //这个计算错误会报错
        ];
    }
}
