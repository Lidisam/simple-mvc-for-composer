### 配置方法：
打开app/Models/BaseModel.php，将以下参数配置为本机：

>
    public $dbConfig = [
        'dsn' => 'mysql:host=localhost;dbname=test;charset=utf8',
        'user' => 'root',
        'pwd' => 'root'
    ];

> 然后导入articles.sql文件之后，运行访问routes.php对应的路由，例如http:xxxx/