<?php

session_start();   // 세션시작

// 입력받을 값(변수지정)
$pw1=$_POST["user_pw1"];
$pw2=$_POST["user_pw2"];
$adress=$_POST["adress"];
$tel=$_POST["tell"];
$email=$_POST["email"];
// DB접속 코드
require "../dbconn.php";

$strSQL="update member set u_pass='$pw1', adress='$adress', tell='$tel', email='$email' where u_id='$_SESSION[user_id]'";
$rs=mysql_query($strSQL,$conn);
/*if(!$name) $name=$_SESSION[name];
$strSQL="update member set u_name='$name'";

if($pw1) $strSQL.=", u_pass='$pw1'";
if($adress) $strSQL.=", adress='$adress'";
if($tel) $strSQL.=", tell='$tel'";
if($email) $strSQL.=", email='$email'";

$strSQL.=" where u_id='$_SESSION[user_id]'";
$rs=mysql_query($strSQL,$conn); */

if($rs) {
//  $_SESSION[name]=$name;
header("Location:info.php?ch=1");
}
else {
  header("Location:info.php?ch=2");
  exit();
}


 ?>
