<?php
namespace App\Controllers;

use App\Models\Article;
use Tool\View;

/**
 * \HomeController
 */
class HomeController extends BaseController
{

    public function home()
    {
        $article = new Article();
//        dd($article->first());
        echo View::getView()->make('home', ['a' => '这是aaa', 'b' => 'b是标题'])->render();
    }
}
