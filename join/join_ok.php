<?php

  $id=$_POST["user_id"];
  $pw1=$_POST["user_pw1"];
  $pw2=$_POST["user_pw2"];
  $name=$_POST["name"];
  $num1=$_POST["id_num1"];
  $num2=$_POST["id_num2"];
  $adress=$_POST["adress"];
  $tel=$_POST["tell"];
  $email=$_POST["email"];

  require "dbconn.php";

  $strSQL="select u_id from member where u_id='".$id."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if($rs_arr) {
    echo "<script>
      alert('중복 ID!! 회원가입 실패!!');
      history.back();
    </script>";
  } else {
    $strSQL="insert into member values ('','$id','$pw1','$name','$num1-$num2','$adress','$tel','$email',now())";
    mysql_query($strSQL,$conn);
    echo "<script>
      alert('회원가입을 축하드립니다!!');
      location.replace('index.php');
    </script>";
  }

 ?>
