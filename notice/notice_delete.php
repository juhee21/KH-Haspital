<?php
  $r_num=$_GET["num"];
  $r_pass=$_POST["n_pass"];

  require "../dbconn.php";
  $strSQL="select n_number, n_password from notice where n_number='".$r_num."' and n_password='".$r_pass."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if ($rs_arr) {
    $strSQL="delete from notice where n_number='".$r_num."'";
    $rs=mysql_query($strSQL,$conn);

    if ($rs) {
      echo "<script>
        alert('게시물이 삭제되었습니다.');
        location.replace('notice_list.php');
      </script>";
    }
  } else {
    echo "<script>
      alert('게시물을 삭제할 수 없습니다.');
      history.back();
    </script>";
  }
 ?>
