<?php
namespace App\Models;
/**
 * Article Model
 */
class Article extends BaseModel
{

    /**
     * Article constructor.
     */
    function __construct()
    {
        parent::__construct();
    }


    public function first()
    {
        return parent::$model->select()->from('articles');
    }
}