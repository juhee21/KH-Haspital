<?php
  $r_num=$_GET["num"];
  $r_pass=$_POST["b_pass"];

  require "../dbconn.php";
  $strSQL="select strNumber, strPassword from board where strNumber='".$r_num."' and strPassword='".$r_pass."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if ($rs_arr) {
    $strSQL="delete from board where strNumber='".$r_num."'";
    $rs=mysql_query($strSQL,$conn);

    if ($rs) {
      echo "<script>
        alert('게시물이 삭제되었습니다.');
        location.replace('board_list.php');
      </script>";
    }
  } else {
    echo "<script>
      alert('게시물을 삭제할 수 없습니다.');
      history.back();
    </script>";
  }
 ?>
