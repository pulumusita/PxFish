<?php
function check_xss_login($link){
    if(isset($_COOKIE['ant']['uname']) && isset($_COOKIE['ant']['pw'])){
        //这里如果不对获取的cookie进行转义，则会存在SQL注入漏洞，也会导致验证被绕过
        $username=escape($link, $_COOKIE['ant']['uname']);
        $password=escape($link, $_COOKIE['ant']['pw']);
//         $username=$_COOKIE['ant']['uname'];
//         $password=$_COOKIE['ant']['pw'];
        $query="select * from users where username='$username' and sha1(password)='$password'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            return $data['id'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>