### 要求
文件不能存放在中文目录下


### 配置方法：
打开tool/DB.php，将以下参数配置为本机：

>
    public $dbConfig = [
        'dsn' => 'mysql:host=localhost;dbname=test;charset=utf8',
        'user' => 'root',
        'pwd' => 'root'
    ];

> 然后导入articles.sql文件之后，运行访问routes.php对应的路由，例如http:xxxx/

### 用法
该框架引入了如下package:
>     
    "noahbuscher/macaw": "dev-master",
    "slim/pdo": "~1.9",
    "xiaoler/blade": "^0.3.1"
      
对应文档用法可在 https://packagist.org/ 获取。