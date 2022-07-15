<?php

  $b_name=$_POST["name"];
  $b_pw=$_POST["board_pw"];
  $b_email=$_POST["email"];
  $b_sub=$_POST["board_sub"];
  $b_cont=$_POST["board_cont"];

  require "DBconn/dbconn.php";

  $strSQL="insert into board set strName='$b_name', strPassword='$b_pw', strEmail='$b_email', strSubject='$b_sub', strContent='$b_cont', htmlTag='$b_tag', writeDate=now()";
  $rs=mysql_query($strSQL,$conn);

  if($rs){
    echo "<script>
      alert('글이 성공적으로 등록되었습니다');
      location.replace('board_list.php');
    </script>";
  }
  else{
    echo "<script>
      alert('글을 등록하는데 실패하였습니다');
      history.back();
    </script>";
  }
 ?>
