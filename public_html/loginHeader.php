<?php
session_start();
$path="";
$name="";

if(isset($_SESSION["logined"]) and $_SESSION["logined"]==0 ){
    //login
    $path="userDetail.php?id=".$_SESSION["userId"];
    $name=$_SESSION["nickName"];
}else{
    //not login
    $path="login.php";
    $name="Login Now";
}

echo"
    <script>
    window.onload =function(){
        updateNum();
    }
    </script>
";

?>