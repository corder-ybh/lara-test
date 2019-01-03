# README

##系统框架
* laravel5.7
* laravel-permission 2.29.0
* bootstrap 3.3.7

##系统部署
1. git clone 代码到本地
2. 执行初始化[sql](doc/lara.sql)
3. 执行```composer install``` 安装组件
4. 配置[nginx配置文件](doc/nginx)
5. 重启nginx，测试访问

##项目目录
* controller目录: /app/Http/Controllers/
* Models目录: /app/Http/Models/
* 中间件: /app/Http/Middleware/
* 工具类: /app/Http/Utils/
* 路由配置: /routes/web.php
