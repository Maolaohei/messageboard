<?php
//查询所有数据

include 'public_function.php';
$sql = "select * from comment_list ";
$mess = fetchALL($sql);
define("APP", "itcast");
require 'list_html.php';
    