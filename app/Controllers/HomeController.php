<?php
namespace App\Controllers;

use App\Models\Article;
use App\Repositories\AuthRepository;
use Tool\View;


class HomeController extends BaseController
{

    protected $auth;

    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function home()
    {
        $article = new Article();
        $data = $article->first();
        var_dump($data);
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
