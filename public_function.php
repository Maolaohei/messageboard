<!-- 代码公共函数 -->
<?php
//链接数据库和设置字符串
function dbInit()
{
 //链接mysql
    $link = mysqli_connect('127.0.0.1', 'root', '1361956310', 'msg');
    if (!$link) {
        die('连接失败' . mysqli_connect_error());
    }
    mysqli_set_charset($link, 'utf8');
    return $link;
};
//查询函数
function query($sql)
{
    $link = dbInit();
    if ($res = mysqli_query($link, $sql)) {
        return $res;
    } else {
        echo 'SQL执行失败';
        echo "错误的SLQ" . $sql . "<br/>";
        echo "错误代码SQL" . mysqli_error($link);
        
        die;
    }
};
//多条数据
function fetchALL($sql)
{
    $row = array();
    if ($res = query($sql)) {
        $rows = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row;
        }
        //释放结果
        mysqli_free_result($res);

        return $rows;
    } else {
        return false;
    }
}
//单条数据
function fetchrow($sql)
{

    if($res=query($sql)) {
        $row =mysqli_fetch_array($res);
        return  $row ;
    }
    return false;
};
//安全处理
function safeHandler($data){
    $link = dbInit();
    //HTML转义
    $data = htmlspecialchars($data);
    //特殊字符处理
    $data = mysqli_real_escape_string($link, $data);
    return $data;
}
