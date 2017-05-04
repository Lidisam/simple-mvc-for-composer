<?php
namespace App\Controllers;

use App\Models\Article;
use Tool\View;


class HomeController extends BaseController
{

    public function home()
    {
        $article = new Article();
        //TODO:该PDO有问题，需要切换成另一个https://packagist.org/packages/aura/sqlquery
        $data = $article->first();
        echo View::getView()->make('home', ['a' => '这是aaa', 'b' => 'b是标题'])->render();
    }

    /**
     * @ApiDescription(section="Test", description="首页测试控制器")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/test")
     * @ApiParams(name="id", type="integer", nullable="true", description="用户id")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'transaction_id':'int',
     *  'transaction_status:'string'
     * }")
     */
    public function test()
    {
        echo json_encode($_POST['id']);
    }
}
