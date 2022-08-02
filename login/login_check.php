<?php
  session_start();

  //trim(); 앞 뒤 공백을 제거해주는 함수 - 비정상적인 코드에 공백 다수 포함
  $id=trim($_POST["user_id"]);
  $pw=trim($_POST["user_pw"]);

  if ($id == "" && $pw =="") {
    echo "<script>
      alert('아이디와 패스워드를 모두 입력해주세요.');
      history.back();
    </script>";
    exit();
  }

  $id=str_replace("#", "", $id);
  $id=str_replace("--", "", $id);
  $id=str_replace("'", "", $id);
  $id=str_replace(";", "", $id);
  $id=str_replace("/*", "", $id);

  $pw=str_replace("#", "", $pw);
  $pw=str_replace("--", "", $pw);
  $pw=str_replace("'", "", $pw);
  $pw=str_replace(";", "", $pw);
  $pw=str_replace("/*", "", $pw);
  //#|'' 문자가 들어가면 없어지게 재설정

  if (preg_match("/select|insert|union|drop|update/i", $id)) {
    exit("<script>alert('hacking!!!'); history.back();</script>");
  }//select|insert|union|drop|update 값이 들어가면 hacking 경고문과 함께 이전페이지로

  if (preg_match("/from|limit|information_schema|tables|columns/i", $id)) {
    exit("<script>alert('hacking!!!'); history.back();</script>");
  }//from|limit|information_schema|tables|columns 값이 들어가면 hacking 경고문과 함께 이전페이지로


  require "../dbconn.php";

  $strSQL="select * from patient where p_id='".$id."' and p_pw='".$pw."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if(($id == $rs_arr[p_id]) && ($pw == $rs_arr[p_pw])){ //입력 값과 출력 값이 같으면 로그인이 가능하도록 수정
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
