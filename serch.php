<!-- 搜索功能实现 -->
<?php
header('content-type:text/html;charset=utf-8');
//链接mysql
$link=mysqli_connect('127.0.0.1','root','1361956310','msg');
if(!$link){
   die('连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
//特殊字符处理

//初始化
if(empty($_GET["name"])){
    //查询框没内容返回主页
    header("location:paging.php");
}

if(!isset($_GET["name"])){
    $sql_where="";
  
}else{
    $name=mysqli_real_escape_string($link,$_GET["name"]);
    $sql_where="where name like '%$name%' ";
}


$sql="select * from comment_list $sql_where";
$result=mysqli_query($link,$sql);
$count=mysqli_fetch_row($result);
    @$count=$count[0];//获取结果条数
$page =isset($_GET["page"])?intval($_GET["page"]):1;

//每页查询的行数数据
$page_size=6;
//开始
$limit=($page-1)*$page_size;
//页数
$max_page=ceil($count/$page_size);
$page=$page>$max_page?$max_page:$page;
$page=$page<1?1:$page;

//////////////////////////////////////////
if(!isset($_GET["page"])){
    $page=1;
}else{
    $page=$_GET["page"];
}
$sql="select * from comment_list $sql_where LIMIT  $limit,$page_size ";
$result=mysqli_query($link,$sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
       $mess[]=$row;
    }
} 
$max_page=$max_page<=0?1:$max_page;

$page_html="<a href='serch.php?page=1&name=".$name."'>首页</a>&nbsp;";
$page_html.="<a href='serch.php?page=".(($page-1>1)?($page-1):1)."&name=".$name."'>上一页</a>&nbsp;";
$page_html.="<a href='serch.php?page=".(($page+1<$max_page)?($page+1):$max_page)."&name=".$name."'>下一页</a>&nbsp;";
$page_html.="<a href='serch.php?page=".$max_page."&name=".$name."'>最后一页</a>&nbsp;";
$page_html.="总页数($max_page)";
define("APP","itcast");
//关闭连接
mysqli_close($link);

require 'list_html.php';

?>