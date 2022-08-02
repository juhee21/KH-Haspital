<?php

session_start();   // 세션시작

if ($_POST["token"]!=$_SESSION[token]) {
  echo "<script>
    alert('요청의 경로가 올바르지 않습니다.');
    history.back();
  </script>";
  exit();
}

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

$rs=mysql_query($strSQL,$conn);

if($rs) {
  header("Location:info.php?ch=1");
}
else {
  header("Location:info.php?ch=2");
  //exit();
}
 ?>
