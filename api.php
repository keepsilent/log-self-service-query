<?php
class Log {

    public static function main(){
        if(!empty($_GET['action'])){
            $action = $_GET['action'];
            self::$action();
            exit;
        }
    }

    public static function getLog(){
        $html = '';
        $path = isset($_POST['path']) ? $_POST['path'] : '';
        $page = isset($_POST['page']) ? $_POST['page'] : 50;

        if(empty($path)) {
            self::msg(1,'','路径不能为空');
        }

        if(is_dir($path)) {
            self::msg(1,'','不能读取文件夹');
        }

        $result = self::readLogs($path,$page);
        foreach($result as $line){
            if(strpos($line,"error:")){
                $line="<font color='red'>".$line."</font>";
            }
            $html.="<div class='line'>".$line."<div>";
        }

        self::msg(0,$html);
    }


    /**
     * 读取日志
     */
    private static function readLogs($filePath,$num=20){
        $fp = fopen($filePath,"r");
        $pos = -2;
        $eof = "";
        $head = false;   //当总行数小于Num时，判断是否到第一行了
        $lines = array();

        while($num>0){
            while($eof != "\n" && $eof !== "\r" && $eof !== false ){
                if(fseek($fp, $pos, SEEK_END)==0){    //fseek成功返回0，失败返回-1
                    $eof = fgetc($fp);
                    $pos--;
                }else{                               //当到达第一行，行首时，设置$pos失败
                    fseek($fp,0,SEEK_SET);
                    $head = true;                   //到达文件头部，开关打开
                    break;
                }

            }
            array_unshift($lines,fgets($fp));
            if($head){ break; }                 //这一句，只能放上一句后，因为到文件头后，把第一行读取出来再跳出整个循环
            $eof = "";
            $num--;
        }
        fclose($fp);
        return array_reverse($lines);
    }


    public static function getFile() {
        $path = isset($_POST['path']) ? $_POST['path'] : '';

        if(empty($path)) {
            self::msg(1,'','路径不能为空');
        }

        if(!file_exists($path)) {
            self::msg(1,'','文件目录不存在');
        }

        $data = []; $i = 0;
        $list = scandir($path);
        foreach ($list as $key => $value) {
            if($value == '.' || $value == '..') {
                continue;
            }

            $data[$i++] = $value;
        }

        self::msg(0,$data);
    }

    public static function msg ($code = 0, $data = '', $mssage = '') {
        $data = array('code' => $code ,'data'=> $data, 'message'=> $mssage);
        echo json_encode($data,true);
        exit();
    }

}

log::main();
?>