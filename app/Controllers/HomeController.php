<?php
namespace App\Controllers;

use App\Models\Article;
/**
* \HomeController
*/
class HomeController extends BaseController
{
  
  public function home()
  {
    Article::first();
    require dirname(__FILE__).'/../views/home.php';
  }
}
