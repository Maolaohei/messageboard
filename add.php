<?php

include 'public_function.php';
$link = mysqli_connect('127.0.0.1', 'root', '1361956310', 'msg');
if (!$link) {
    die('连接失败' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
//求MySQL数据库中的总记录数
$sql = "select * from comment_list   ";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while ($row = mysqli_fetch_assoc($result)) {
        $mess[] = $row;
    }
}
if (!empty($mess)) {
    $add_id = end($mess)['id'];
} else {
    $add_id = 1;
}
if (@!empty($_POST)) {
    ////
    $filelds = array("name", "email", "comment", "pass");
    $filelds_str = implode(',', $filelds);
    $update = array();
    foreach ($filelds as $k => $v) {
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        if ($data == '') die($v . '字段不能为空');

        safeHandler($data);
        $filelds[$k] = "`$v`";
        $insert[] = "'$data'";
    }

    $insert_str = implode(',', $insert);

    $sql = "insert into comment_list(id,$filelds_str,comment_date) value($add_id+1,$insert_str,now())";
    if ($res = query($sql)) {

        header('location:paging.php');
        exit;
    } else {
        exit('添加失败');
    }

    //////


} else {


    require 'addhtml.php';
}
