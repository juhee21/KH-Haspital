<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>문의게시판</title>
    <link rel="stylesheet" href="../style_contents.css" type="text/css">
  </head>
  <body>
    <iframe src="../main/head.php" width="100%" frameborder="0"></iframe>
    <div class="contents">
      <?php
        session_start();
        if ($_SESSION[user_id]) {
          require "../dbconn.php";
          $strSQL="select p_name from patient where p_id='$_SESSION[user_id]'";
          $rs=mysql_query($strSQL,$conn);
          $rs_arr=mysql_fetch_array($rs);
          $name=$rs_arr["p_name"];
        }
        ?>
      <form action="inquiry_write_ok.php" method="post" enctype="multipart/form-data">
        <table width="700">
          <tr>
            <th colspan="2" style="background-color:#323232; color:white; font-size:150%">문 의 게 시 글 작 성</th>
          </tr>
          <tr>
            <th width="120">이 름</th>
            <td><input type="text" name="name" size="20" value="<?=$name?>"></td>
          </tr>
          <tr>
            <th>비밀번호</th>
            <td><input type="password" name="inquiry_pw" size="20"></td>
          </tr>
          <tr>
            <th>제 목</th>
            <td><input type="text" name="inquiry_sub" size="40"></td>
          </tr>
          <tr>
          <tr>
            <th>내 용</th>
            <td><textarea name="inquiry_cont" cols="60" rows="20"></textarea></td>
          </tr>
          <tr>
            <th>파일첨부</th>
            <td><input type="file" name="att_file"></td>
          </tr>
        </table>
        <br>
        <p>
          <input type="submit" value="등록" class="btn_default btn_gray">
          <input type="button" value="목록" class="btn_default btn_gray" onclick="location.replace('inquiry_list.php')">
        </p>
      </form>
    </div>
  </body>
</html>
