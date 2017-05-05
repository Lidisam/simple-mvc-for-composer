<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Article Model
 */
class Article extends Model
{

    public $timestamps = false;


    public function first()
    {
        return $this->all()->toArray();
    }
}