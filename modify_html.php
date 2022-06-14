<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留言板修改</title>
  <script src="js/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/index-style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/modify.css">
</head>

<body>
  <button class="btn-cssbuttons">
    <span>校园留言板/修改</span>
  </button>
  <!-- 正文 -->
  <div class="container">
    <div class="row bg">
      <div class="col-12">
        <?php foreach ($mess as $row) : ?>
          <form method="POST" action="modify.php" id="form">

            <p>留言内容:</p>
            <textarea cols="65" rows="9" name="comment"><?php echo $row['comment']; ?></textarea>
            <p style="color:red">*修改留言时请遵守国家相关的法律法规</p>
            <div id="burow"><input type="submit" id='burow-t' value="提交修改" class="button" >
            <input type="button"  value="修改信息" id="modifymsg" class="button" >
            <input type="button" id='burow-f' name="Submit"  onclick="javascript:history.back(-1);" value="返回上一页"></div>


      </div>




      <div class="row msg" id="msg" style="display:none">
        <div class="col-12" style="padding-left: 5rem;">
          <table>
            <tr>
              <td>留言板编号:</td>
              <td><input type="text" readonly="readonly" name="id" value="<?php echo $row['id'];?>" style=" BACKGROUND: #CCC;"><span style="color: red;">(*不可修改)</span></td>
            </tr>
            <tr>
              <td>留言者:</td>
              <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
              <td>电子邮件:</td>
              <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
              <td>修改密码:</td>
              <td><input type="text" name="pass" value="<?php echo $row['pass']; ?>"></td>
            </tr>

          </table>
          <input type="button" value="取消" id="qx" class="button qx" >
          <input type="button" value="确认" id="xg" class="button xg" >

        </div>
      </div>
    <?php endforeach; ?>
    </form>
    </div>
  </div>
  <!-- 页脚 -->
  <footer>
    <p>Copyright © 2022-2022 校园留言板 helloword.com All Rights Reserved. 备案号：闽9999号-9</p>
  </footer>

</body>
<script>
  $('#modifymsg').click(function() {
    $('form').css('display', 'none')
    $('#msg').css('display', 'block')
    $('.bg').addClass('bg-msg')
    //调整页脚
    $('footer').addClass('footer_A')
    // 
  })

  $('#qx').click(function() {
    $('.bg').removeClass('bg-msg')
    $('#msg').css('display', 'none')
    $('form').css('display', 'block')
      //调整页脚
      $('footer').removeClass('footer_A')
    alert('取消成功')
    

    // 
  })
  $('#xg').click(function() {
    $('.bg').removeClass('bg-msg')
    $('#msg').css('display', 'none')
    $('form').css('display', 'block')
      //调整页脚
      $('footer').removeClass('footer_A')
    alert('修改成功')

    // 
  })
</script>

</html>

<!-- Content here -->