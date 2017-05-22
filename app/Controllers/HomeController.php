<?php
namespace App\Controllers;

use App\Models\Article;
use App\Repositories\AuthRepository;
use App\Repositories\DemoRepository;
use Tool\View;


class HomeController extends BaseController
{

    protected $demo;

    public function __construct()
    {
        $this->demo = new DemoRepository();
    }

    public function home()
    {
        $article = new Article();
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

    /**
     * 钩子演示demo
     */
    public function hook_demo()
    {
        $this->demo->hook->update();  //执行钩子方法
    }
}
