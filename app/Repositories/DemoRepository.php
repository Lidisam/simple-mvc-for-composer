<?php

namespace App\Repositories;


use Tool\Hook;

class DemoRepository
{
    public $hook;

    function __construct()
    {
        $this->hook = new Hook();
        $this->hook->setTargetClass($this);
    }

    public function update()
    {
        echo "更新中</br>";
    }

    public function before_update()
    {
        echo "更新前</br>";
    }

    public function after_update()
    {
        echo "更新后</br>";
    }
}