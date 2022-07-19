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

$strSQL="update patient set";

if ($pw1) {$strSQL.=" p_pw='$pw1'";}
if ($adress) {$strSQL.=", p_addr='$adress'";}
if ($tel) {$strSQL.=", p_tel='$tel'";}
if ($email) {$strSQL.=", p_email='$email'";}

$strSQL.=" where p_id='$_SESSION[user_id]';";

//$strSQL="update patient set p_pass='$pw1', p_addr='$adress', p_tel='$tel', p_email='$email' where p_id='$_SESSION[user_id]'";
$rs=mysql_query($strSQL,$conn);

if($rs) {
//  $_SESSION[name]=$name;
  header("Location:info.php?ch=1");
}
else {
  header("Location:info.php?ch=2");
  //exit();
}
 ?>
