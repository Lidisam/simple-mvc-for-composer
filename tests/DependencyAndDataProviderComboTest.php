<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

require "../vendor/autoload.php";


/**
 * 测试同时从 @dataProvider 方法和一个或多个 @depends 测试接收数据
 */
class DependencyAndDataProviderComboTest extends TestCase
{
    public function provider()
    {
        return [['provider1'], ['provider2']];
//        return [['provider1']];
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends      testProducerFirst
     * @depends      testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['provider1', 'first', 'second'],
            func_get_args()    //不相等
        );
    }
}
