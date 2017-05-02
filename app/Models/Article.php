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

    }


    public function first()
    {
        return parent::getInstance()->select()->from('articles');
    }
}