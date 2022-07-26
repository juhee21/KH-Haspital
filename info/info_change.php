<?php

session_start();   // 세션시작

// 입력받을 값(변수지정)
$pw1=$_POST["user_pw1"];
$pw2=$_POST["user_pw2"];
$age=$_POST["age"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$address=$_POST["address"];


// DB접속 코드
require "../dbconn.php";
$strSQL="update patient set p_pw='$pw1', p_age='$age', p_email='$email', p_tel='$tel', p_addr='$address' where p_id='$_SESSION[user_id]';";
//$strSQL="update patient set";

/*
if ($pw1) {$strSQL.=" p_pw='$pw1'";}
if ($age) {$strSQL.=", p_age='$age'";}
if ($email) {$strSQL.=", p_email='$email'";}
if ($tel) {$strSQL.=", p_tel='$tel'";}
if ($address) {$strSQL.=", p_addr='$address'";}

$strSQL.=" where p_id='$_SESSION[user_id]';";
*/
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
