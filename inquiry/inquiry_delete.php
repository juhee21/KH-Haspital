<?php
  $r_num=$_GET["num"];
  $r_pass=$_POST["i_pass"];

  require "../dbconn.php";
  $strSQL="select i_number, i_password from inquiry where i_number='".$r_num."' and i_password='".$r_pass."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if ($rs_arr) {
    $strSQL="delete from inquiry where i_number='".$r_num."'";
    $rs=mysql_query($strSQL,$conn);

    if ($rs) {
      echo "<script>
        alert('게시물이 삭제되었습니다.');
        location.replace('inquiry_list.php');
      </script>";
    }
  } else {
    echo "<script>
      alert('게시물을 삭제할 수 없습니다.');
      history.back();
    </script>";
  }
 ?>
