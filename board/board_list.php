<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>문의게시판</title>
      <link rel="stylesheet" href="../style_contents.css" type="text/css">
  </head>
  <body>
    <iframe src="../head.php" width="100%" frameborder="0"></iframe>
    <div class="contents">
      <table width="700" border="1">
        <tr>
          <th colspan="5" style="background-color:#323232; color:white; font-size:150%">문의게시판</th>
        </tr>
        <tr style="background-color:#c8c8c8">
          <th width="7%">번호</th>
          <th width="40%">제목</th>
          <th width="15%">작성자</th>
          <th width="30%">등록일</th>
          <th width="8%">조회</th>
        </tr>
        <?php
          require "DBconn/dbconn.php";
          $strSQL="select * from board";
          $rs=mysql_query($strSQL, $conn);
          while ($rs_arr=mysql_fetch_array($rs)) {
            $b_num=$rs_arr["strNumber"];
            $b_name=$rs_arr["strName"];
            $b_sub=$rs_arr["strSubject"];
            $b_no=$rs_arr["viewCount"];
            $b_date=$rs_arr["writeDate"];
         ?>
         <tr>
           <td><?=$b_num?></td>
           <td><a href="board_view.php?num=<?=$b_num?>" style="color: #323232"><?=$b_sub?></a></td>
           <td><?=$b_name?></td>
           <td><?=$b_date?></td>
           <td><?=$b_no?></td>
         </tr>
         <?php } ?>
      </table>
      <br>
      <p>
        <input type="button" value="글쓰기" class="btn_default btn_gray" onclick="location.replace('board_write.php')">
      </p>
    </div>

  </body>
</html>
