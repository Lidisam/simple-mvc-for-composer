<?php
namespace Tool;

/**
 * 执行前执行后钩子类
 * Class Hook
 * @package Tool
 */
class Hook
{
    protected $targetClass;

    public function setTargetClass($classObj)
    {
        $this->targetClass = $classObj;
    }

    private function invoker($name, $arguments)
    {
        if (method_exists($this->targetClass, 'before_' . $name)) call_user_func_array([$this->targetClass, 'before_' . $name], $arguments);
        call_user_func_array([$this->targetClass, $name], $arguments);
        if (method_exists($this->targetClass, 'after_' . $name)) call_user_func_array([$this->targetClass, 'after_' . $name], $arguments);
    }

    public function __call($name, $arguments)
    {
        // TODO:Implemnt __call() method
        $this->invoker($name, $arguments);
    }
}