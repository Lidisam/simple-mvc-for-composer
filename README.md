### 要求
文件不能存放在中文目录下
PHP >= 5.6.4


### 配置方法：
首先： 
> composer install

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
    "illuminate/database": "*"
    "xiaoler/blade": "^0.3.1"
    "crada/php-apidoc": "@dev"
      
注：对应文档用法可在 https://packagist.org/ 获取。

api文档用法:
- 在cli下执行:
> php apidoc.php

