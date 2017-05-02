<?php
namespace Tool;

use Xiaoler\Blade\Compilers\BladeCompiler;
use Xiaoler\Blade\Engines\CompilerEngine;
use Xiaoler\Blade\Factory;
use Xiaoler\Blade\FileViewFinder;

/**
 * Class View
 */
class View
{
    /**
     * 获取视图
     * @return Factory
     */
    public static function getView()
    {
        $compiler = new BladeCompiler($_SERVER['DOCUMENT_ROOT'] . '/cache');
        $engine = new CompilerEngine($compiler);
        $finder = new FileViewFinder([$_SERVER['DOCUMENT_ROOT'] . '/app/Views']);
        $factory = new Factory($engine, $finder);
        return $factory;
    }
}