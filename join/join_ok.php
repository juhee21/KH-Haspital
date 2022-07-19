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

  require "../dbconn.php";

<<<<<<< HEAD
  $strSQL="select p_id from patient where p_id='".$id."';";
=======
  $strSQL="select u_id from member where u_id='".$id."';";
>>>>>>> a2737e490d22561c0327996388188589adb30497
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if($rs_arr) {
    echo "<script>
      alert('중복 ID!! 회원가입 실패!!');
      history.back();
    </script>";
  } else {
<<<<<<< HEAD
    $strSQL="insert into patient set p_id='$id', p_pw='$pw1', p_name='$name', p_RRN='$num1-$num2', p_addr='$adress', p_tel='$tel', p_email='$email', reg_date=now())";
=======
    $strSQL="insert into member values ('','$id','$pw1','$name','$num1-$num2','$adress','$tel','$email',now())";
>>>>>>> a2737e490d22561c0327996388188589adb30497
    mysql_query($strSQL,$conn);
    echo "<script>
      alert('회원가입을 축하드립니다!!');
      location.replace('index.php');
    </script>";
  }

 ?>
