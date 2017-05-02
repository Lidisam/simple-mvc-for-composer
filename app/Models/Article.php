<?php
namespace App\Models;

use Tool\DB;

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
        return DB::getInstance()->select()->from('articles');
    }
}