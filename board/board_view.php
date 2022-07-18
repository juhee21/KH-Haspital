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
        require "../dbconn.php";

        $r_num=$_GET["num"];
        $strSQL="update board set viewCount=viewCount+1 where strNumber='".$r_num."';";
        mysql_query($strSQL,$conn);

        $strSQL="select * from board where strNumber='".$r_num."';";
        $rs=mysql_query($strSQL,$conn);
        $rs_arr=mysql_fetch_array($rs);

        $b_num=$rs_arr["strNumber"];
        $b_name=$rs_arr["strName"];
        $b_email=$rs_arr["strEmail"];
        $b_sub=$rs_arr["strSubject"];
        $b_cont=$rs_arr["strContent"];
        $b_no=$rs_arr["viewCount"];
        $b_date=$rs_arr["writeDate"];
        $b_fname=$rs_arr["fileName"];
        $b_fsize=$rs_arr["fileSize"];
       ?>
      <table width="700" border="1">
        <tr>
          <th colspan="4" style="background-color:#323232; color:white; font-size:150%">내 용 보 기</th>
        </tr>
        <tr>
          <th>이름</th>
          <td><?=$b_name?></td>
          <th>등록일</th>
          <td><?=$b_date?></td>
        </tr>
        <tr>
          <th>이메일</th>
          <td><?=$b_email?></td>
          <th>조회수</th>
          <td><?=$b_no?></td>
        </tr>
        <tr>
          <th>제목</th>
          <td colspan="3"><?=$b_sub?></td>
        </tr>
        <tr>
          <th>내용</th>
          <td colspan="3" style="padding:30px 0;"><?=$b_cont?></td>
        </tr>
        <tr>
          <th>첨부파일</th>
          <td colspan="3"></td>
        </tr>
      </table>
      <br>
       <p>
         <form action="board_delete.php?num=<?=$b_num?>" method="post">
           비밀번호 <input type="password"  name="b_pass" size="20">
           <input type="submit" value="삭제" class="btn_default btn_gray">
           &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="button" value="목록" class="btn_default btn_gray" onclick="location.replace('board_list.php')">
         </form>
       </p>
    </div>
  </body>
</html>
