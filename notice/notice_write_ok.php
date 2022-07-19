<?php

  $b_name=$_POST["name"];
  $b_pw=$_POST["notice_pw"];
  $b_email=$_POST["email"];
  $b_sub=$_POST["notice_sub"];
  $b_cont=$_POST["notice_cont"];

  require "../dbconn.php";

  $strSQL="insert into notice set n_name='$n_name', n_password='$n_pw', n_email='$n_email', n_subject='$n_sub', n_content='$n_cont', writeDate=now()";
  $rs=mysql_query($strSQL,$conn);

  if($rs){
    echo "<script>
      alert('글이 성공적으로 등록되었습니다');
      location.replace('notice_list.php');
    </script>";
  }
  else{
    echo "<script>
      alert('글을 등록하는데 실패하였습니다');
      history.back();
    </script>";
  }
 ?>
