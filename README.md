# log-self-service-query
日志自助查询器

# 背景介绍
由于服务器生成的错误日志产生在服务器里，需要服务器管理人员才能调阅。

# 功能
* 限定指定读取目录文件
* 限定读出文件的行数
* 从最后一行开始读取数据
* 逐行逐行读取数据（Ps:防止文件过大，导致内存溢出)

# 使用方法

````
<li>文件目录:
    <input type="radio" name="path" value="./log/"  onclick="log.selectPath($(this))" checked>Nginx
    <input type="radio" name="path" value="./dist/" onclick="log.selectPath($(this))" >PHP
    <!-- <input type="radio" name="path" value="{目录路径:./log/}" onclick="log.selectPath($(this))" >{名称}-->
</li>
````
* 将 {目录路径:./log} 替换成指定目录路径
* 将 {名称} 替换成目录类型

# Bug
* 无法读取出 xml 包括的数据

````
[25-Jan-2019 11:02:20 Asia/Shanghai] [2019-01-25 11:02:20] NULL.DEBUG: Request received: {"method":"POST","uri":"http://www.baidu.com","content-type":"xml","content":"<xml>
    <Title><![CDATA[title]]></Title>
    <Description><![CDATA[Description]]></Description>
</xml>
"}
````

# 环境要求
* PHP 5.6 

# 参考资料
* [PHP 读取大文件并显示](https://www.cnblogs.com/taoshihan/p/5722743.html)