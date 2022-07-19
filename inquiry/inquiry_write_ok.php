<?php

  $i_name=$_POST["name"];
  $i_pw=$_POST["inquiry_pw"];
  $i_sub=$_POST["inquiry_sub"];
  $i_cont=$_POST["inquiry_cont"];

  require "../dbconn.php";

  $strSQL="insert into inquiry set i_name='$i_name', i_password='$i_pw', i_subject='$i_sub', i_content='$i_cont', writeDate=now()";
  $rs=mysql_query($strSQL,$conn);

  if($rs){
    echo "<script>
      alert('글이 성공적으로 등록되었습니다');
      location.replace('inquiry_list.php');
    </script>";
  }
  else{
    echo "<script>
      alert('글을 등록하는데 실패하였습니다');
      history.back();
    </script>";
  }
 ?>
