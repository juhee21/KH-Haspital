<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>공지사항</title>
      <link rel="stylesheet" href="../style_contents.css" type="text/css">
  </head>
  <body>
    <iframe src="../main/head.php" width="100%" frameborder="0"></iframe>
    <div class="contents">
      <table width="700">
        <tr>
          <th colspan="5" style="background-color:#323232; color:white; font-size:150%">공지사항</th>
        </tr>
        <tr style="background-color:#c8c8c8">
          <th width="7%">번호</th>
          <th width="40%">제목</th>
          <th width="15%">작성자</th>
          <th width="30%">등록일</th>
          <th width="8%">조회</th>
        </tr>
        <?php
          session_start();
          require "../dbconn.php";

          $strSQL="";
          if ($_GET["keyword"]) {
            $keyword=$_GET["keyword"];
            $key_select=$_GET["key_select"];

            switch ($key_select) {
              case '1':
                $strSQL="select * from notice where n_subject like '%$keyword%' order by n_number desc";
                break;
              case '2':
                $strSQL="select * from notice where n_content like '%$keyword%' order by n_number desc";
                break;
              case '3':
                $strSQL="select * from notice where n_name like '%$keyword%' order by n_number desc";
                break;

              default:
                $strSQL="select * from notice order by n_number desc";
            }
          } else {
            $strSQL="select * from notice order by n_number desc";
          }

          $rs=mysql_query($strSQL,$conn);
          $rs_num=mysql_num_rows($rs);
          if ($rs_num == 0) : ?>
            <tr>
              <td colspan="5" class="center"><strong>등록된 게시물이 없습니다.</strong></td>
            </tr>
          <?php else:
          while ($rs_arr=mysql_fetch_array($rs)) {
            $n_num=$rs_arr["n_number"];
            $n_name=$rs_arr["n_name"];
            $n_sub=$rs_arr["n_subject"];
            $n_no=$rs_arr["viewCount"];
            $n_date=$rs_arr["writeDate"];
         ?>
         <tr>
           <td><?=$n_num?></td>
           <td><a href="notice_view.php?num=<?=$n_num?>" style="color: #323232"><?=$n_sub?></a></td>
           <td><?=$n_name?></td>
           <td><?=$n_date?></td>
           <td><?=$n_no?></td>
         </tr>
       <?php } endif; ?>
      </table>
      <br>
      <p>
        <?php
          if ($_SESSION[user_id] == maikol) {
         ?>
        <input type="button"  value="글쓰기" class="btn_default btn_gray" onclick="location.replace('notice_write.php')">

      <?php } ?>
        <br>
        <br>
        <form action="notice_list.php">
          <select name="key_select">
            <option value="1">글제목</option>
            <option value="2">글내용</option>
            <option value="3">작성자</option>
          </select>
          <input type="text" name="keyword">
          <input type="submit" value="검색" class="btn_default btn_gray">
        </form>
      </p>
    </div>
  </body>
</html>
