<?php

  $file_name=urldecode($_GET["filename"]);
  $file_path="./upload/".$file_name;
  $file_size=filesize($file_path);

  require "../dbconn.php";

  $strSQL="select * from induiry where fileName='".$file_name."';";
  $rs=mysql_query($strSQL,$conn);
  $rs_arr=mysql_fetch_array($rs);

  if (!$rs_arr) {
    echo "<script>
      alert('잘못된 다운로드입니다.');
      history.back();
    </script>";
    exit();
  }

  header("Content-Type:application/x-octetstream");
  header("Content-Disposition:attachment;filename=".urlencode($file_name));
  header("Content-Transfer-Encoding:binary");
  header("Content-Length:$file_size");

  readfile($file_path);

 ?>
