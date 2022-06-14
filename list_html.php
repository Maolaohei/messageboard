<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留言板</title>
  <script src="js/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/index-style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
  <button class="btn-cssbuttons">
    <span>校园留言板</span><span>
    
    </span>
    
  </button>
  <!-- 搜索框 -->
  <div class="container" >
    <div class="row">
      <div class="col-12"></div>
  <form class="form" action="serch.php">
      <button>
          <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
              <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
      </button>
      <input class="input" placeholder="请输入你查找的留言者" name='name' type="text">
      <button class="reset" type="reset">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
      </button>
  </form>
</div>
</div>
</div>
<!-- 搜索框结束 -->
  <div class="container">
    <div class="row">
      <?php if (!empty($mess)) {; ?>
        <?php foreach ($mess as $row) : ?>
          <div class="bg col-sm-4 col-ms-12">
            <div class="row onebg">
              <!-- 内容部分 -->
              <div class=" col-6 ">
                
                <p>留言内容:</p>
                <textarea cols="20" rows="9" disabled="true"><?php echo $row['comment']; ?></textarea>
   
              </div>
<!-- 内容结束 -->
              <div class="col-6">
                <br>
                <p>留言板编号:<?php echo $row['id']; ?></p>
                <p>留言者:<span><?php echo $row['name']; ?></span></p>
                <p class="email" >电子邮件:<span><?php echo $row['email']; ?></span></p>
                <p>留言时间:<span><?php echo $row['comment_date']; ?></span></p>

                <a href="modify.php?id=<?php echo $row['id']; ?>">
                <button class="noselect modify"><span class="text">Modify</span>
              
</button></a>
<a href="delete.php?id=<?php echo $row['id']; ?>">
                <button class="noselect del" ><span class="text">Delete</span></button></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php } else {; ?>

        <div class="col-sm-12">
          <h1>暂无有人留言</h1>
        </div>
      <?php }; ?>
    </div>
  </div>
  <!-- 翻页功能 -->
  <div class="page"  >
    <a href="addhtml.php" >我要留言</a>
    <?php echo @$page_html; ?>
  </div>
  <!-- 页脚 -->
  <footer ><p>Copyright © 2022-2022 校园留言板  helloword.com All Rights Reserved. 备案号：闽9999号-9</p></footer>

</body>
<script>
 


  var modify = document.getElementsByClassName('modify');
  var del = document.getElementsByClassName('del');
  for (var i = 0; i < modify.length; i++) {
    modify[i].onclick = function() {
      if (confirm('确定要修改吗？')) {

        if (prompt('请输入密码') == <?php echo $row['pass']; ?>) {
          return true;
        }
        alert('密码错误');
        return false;
      } else {
        return false;
      }
    }
  }
  for (var i = 0; i < del.length; i++) {
    del[i].onclick = function() {
      if (confirm('确定要删除吗？')) {
        if (prompt('请输入密码') == <?php echo $row['pass']; ?>) {
          return true;
        }
        alert('密码错误');
        return false;
      } else {
        return false;
      }
    }
  }
</script>

</html>

