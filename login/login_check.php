<?php
  session_start();

$id=$_POST["user_id"];
 $pw=$_POST["user_pw"];

 if ($id == "" && $pw =="") {
    echo "<script>
      alert('아이디와 패스워드를 모두 입력해주세요.');
      history.back();
    </script>";
    exit();
  }

  require "../dbconn.php";

  $strSQL="select * from patient where p_id='".$id."' and p_pw='".$pw."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

   if(($id=$rs_arr[p_id])&&($pw=$rs_arr[p_pw])){
    $_SESSION[user_id]=$rs_arr[p_id];
    $_SESSION[name]=$rs_arr[p_name];

    echo "<script>
      alert('로그인 되었습니다.');
      location.replace('../main/index.php');
      </script>";
  }
  else {
    echo "<script>
      alert('아이디 또는 패스워드가 일치하지 않습니다.');
      history.back();
      </script>";
  }

 ?>
