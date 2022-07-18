<?php
  session_start();

$id=trim($_POST["user_id"]);
 $pw=trim($_POST["user_pw"]);

  //  trim 공백을 제거해주는 함수(비정상적인 코드 사용시)

 if ($id == "" && $pw =="") {
    echo "<script>
      alert('아이디와 패스워드를 모두 입력해주세요.');
      history.back();
    </script>";
    exit();
  }
  /*if($id=="admin"&&$_SERVER[REMOTE_ADDR]!="192.168.50.1"){
              echo "<script>
          alert('접속이 불가능한 계정입니다.')
          history.back();
        </script>";
      }*/


  require "../dbconn.php";

  $strSQL="select * from member where u_id='".$id."' and u_pass='".$pw."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  // if($rs_arr) {
   if(($id=$rs_arr[u_id])&&($pw=$rs_arr[u_pass])){
    $_SESSION[user_id]=$rs_arr[u_id];
    $_SESSION[name]=$rs_arr[u_name];
    //$_SESSION[ip_addr]=$_SERVER[REMOTE_ADDR];*/
    echo "<script>
      alert('로그인 되었습니다.');
      location.replace('index.php');
      </script>";
  }
  else {
    echo "<script>
      alert('아이디 또는 패스워드가 일치하지 않습니다.');
      history.back();
      </script>";
  }

 ?>
