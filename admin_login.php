<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$PIKA_ROOT_DIR =  "";

include_once $PIKA_ROOT_DIR.'inc/config.inc.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
if ($SELF_PAGE = "admin_login.php"){
    $ACTIVE = array('','','','','','','','active open','','','','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}



$link=connect();

$html = "<center><br><p>请输入您的用户名和密码!</p></br></center>";

if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){

        //这里没有使用预编译方式,而是使用的拼接SQL,所以需要手动转义防止SQL注入
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);


        $query="select * from users where username='$username' and password=md5('$password')";

        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);

            //登录时，生成cookie,1个小时有效期，供其他页面判断
            setcookie('ant[uname]',$_POST['username'],time()+3600);
            setcookie('ant[pw]',sha1(md5($_POST['password'])),time()+3600);


            header("location:admin.php");
//            echo '"<script>windows.location.href="xss_reflected_post.php"</script>';

        }else{
            $html ="<center><br><p>用户名或密码错误!</p></br></center>";
        }

    }else{
        $html ="<center><br><p>请输入您的用户名和密码!</p></br></center>";
    }
}





?>


<!doctype html>
<html lang="zh-cn">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta id="viewport" name="viewport"
    content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <title>后台登录页面</title>
  <style type="text/css">
    @charset "utf-8";
    
    body {
      font-size: 16px;
      background: #eee
    }
    * {
      padding: 0;
      margin: 0;
      list-style: none;
      text-decoration: none
    }
    input:focus {
      outline: 0
    }
    #g_u{border-bottom:1px solid #eaeaea}

    .inputstyle {
      width: 273px;
      height: 44px;
      color: #000;
      border: none;
      background: 0 0;
      padding-left: 15px;
      font-size: 16px;
      -webkit-appearance: none
    }
    .logo {
      height: 244px;
      width: 244px;
      margin: 0 auto 20px;
      background-size: 244px 244px
    }
    #switch,
    #vcode,
    #web_login {
      margin: 0 auto
    }

    #web_login {
      width: 290px
    }
    #g_list {
      background: #fff;
      height: 89px;
      border-radius: 4px
    }

    #go,
    #onekey {
      width: 290px;
      height: 44px;
      line-height: 44px;
      background: #146fdf;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-size: 16px;
      margin-top: 15px;
      display: block
    }

    #switch #forgetpwd,
    #switch #zc {
      color: #246183;
      line-height: 14px;
      font-size: 14px;
      padding: 15px 10px
    }
    #switch #forgetpwd {
      float: left;
      margin-left: -10px
    }
    #switch #zc {
      float: right;
      margin-right: -10px
    }
  </style>

  <style type="text/css">
    .logo {
      background-image: url("static/logo.png");
    }
  </style>
</head>

<body>
  <br>
  <div id="logo" class="logo"></div>

  <form name="input" action='admin_login.php' method="POST">
    <div id="web_login">
      <ul id="g_list">
        <li id="g_u">
          <div id="del_touch" class="del_touch">
            <span id="del_u" class="del_u"></span>
          </div><input id="u" type="text" name="username" class="inputstyle"  placeholder="请输入你的用户名">
        </li>
        <li id="g_p">
          <div id="del_touch_p" class="del_touch">
            <span id="del_p" class="del_u"></span>
          </div><input id="p" type="password" name="password" class="inputstyle" placeholder="请输入你的登录密码">
        </li>
      </ul>
      <input type="submit" name="submit" value="登 录" id="go" >
  </form>
<?php echo $html;?>
</body>
</html>