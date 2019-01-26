<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日志自助查询器</title>
    <link rel="stylesheet" href="./dist/css/base.css?v=2019012501" type="text/css">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h3>日志自助查询器</h3>
            <ul>
                <li>文件名称:
                    <select id="log-select">
                        <option value="">请选择日志</option>
                    </select>
                <li>文件目录:
                    <input type="radio" name="path" value="./log/"  onclick="log.selectPath($(this))" checked>Nginx
                    <input type="radio" name="path" value="./dist/" onclick="log.selectPath($(this))" >PHP
                    <!-- <input type="radio" name="path" value="{目录路径:./log}" onclick="log.selectPath($(this))" >{名称}-->
                </li>
                <li>文件行数: <input type="radio" name="page" value="100" checked>100 <input type="radio" name="page" value="500">500 <input type="radio" name="page" value="1000">1000</li>
                <li>
            </ul>
            <span class="clean-btn" onclick="log.clean()">清空</span>
            <span class="find-btn" onclick="log.find()">确定</span>
        </div>
        <div class="main">
            <h4>查询结果:</h4>
            <div id="log-result"></div>
        </div>
    </div>
</body>
</html>
<script src="./dist/js/lib/jquery.min.js" type="text/javascript"></script>
<script src="./dist/js/request.js?v=2019012501" type="text/javascript"></script>
<script src="./dist/js/log.js?v=2019012501" type="text/javascript"></script>
<script type="text/javascript">
    log.init();
</script>