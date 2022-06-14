<?php

include 'public_function.php';
// 当不是modify.php的时候，需要执行下面的
$link=mysqli_connect('127.0.0.1','root','1361956310','msg');
if(!$link){
   die('连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
if(@!empty($_POST)){
    ////
    $filelds=array("id","name","email","comment","pass");
    $update =array();
    foreach($filelds as $k=>$v){
        $data=isset($_POST[$v])?$_POST[$v]:'';
if($data=='')die($v.'字段不能为空');

safeHandler($data);
    $filelds[$k]="`$v`";
    $update[]="$v='$data'";
 
}

$id= $_POST["id"];
$update_str=implode(',',$update);

    $sql="update comment_list set $update_str,comment_date=now() WHERE id=$id";
if(  $res=query($sql)){

     header('location:paging.php');
     exit;
}else{
    exit('修改失败');
}

//////


}else{

    $id=$_GET['id'];
    $sql="WHERE ID = $id";
    // 查询指定信息
    $sql="select * from comment_list $sql ";
    $result=mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
           $mess[]=$row;
        }
    }
    require 'modify_html.php';

}