<!-- 删除数据 -->

<?php
include 'public_function.php';
header('content-type:text/html;charset=utf-8');
//链接mysql

$id=$_GET['id'];
$sql_where=" ";
if(!isset($_GET[$id])){
    $sql_where="WHERE ID = $id";
}
$sql="DELETE  FROM COMMENT_list $sql_where ";
query($sql);

header('location:paging.php');

?>