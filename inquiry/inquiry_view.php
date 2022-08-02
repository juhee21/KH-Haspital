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
        $strSQL="update inquiry set viewCount=viewCount+1 where i_number='".$r_num."';";
        mysql_query($strSQL,$conn);

        $strSQL="select * from inquiry where i_number=".$r_num.";";
        $rs=mysql_query($strSQL,$conn);
        $rs_arr=mysql_fetch_array($rs);

        $i_num=$rs_arr["i_number"];
        $i_name=$rs_arr["i_name"];
        $i_sub=$rs_arr["i_subject"];
        $i_cont=$rs_arr["i_content"];
        $i_no=$rs_arr["viewCount"];
        $i_date=$rs_arr["writeDate"];
        $i_fname=$rs_arr["fileName"];
        $i_fsize=$rs_arr["fileSize"];
       ?>
      <table width="700" border="1">
        <tr>
          <th colspan="6" style="background-color:#323232; color:white; font-size:150%">내 용 보 기</th>
        </tr>
        <tr>
          <th width="80">이름</th>
          <td width=20%><?=$i_name?></td>
          <th>등록일</th>
          <td width=30%><?=$i_date?></td>
          <th>조회수</th>
          <td width=20%><?=$i_no?></td>
        </tr>
        <tr>
          <th>제목</th>
          <td colspan="5"><?=$i_sub?></td>
        </tr>
        <tr>
          <th>내용</th>
          <td colspan="5" style="padding:30px 0;"><?=$i_cont?></td>
        </tr>
        <tr>
          <th>첨부파일</th>
          <td colspan="5">
            <?php if ($i_fname != "") { ?>
              <a href="inquiry_file_download.php?filename=<?=$i_fname?>" style="color: #323232"><?=$i_fname?>&nbsp;&nbsp;(<?=$i_fsize?>byte)</a>
            <?php } ?>
          </td>
        </tr>
      </table>
      <br>
       <p>
         <form action="inquiry_delete.php?num=<?=$i_num?>" method="post">
           비밀번호 <input type="password" name="i_pass" size="20">
           <input type="submit" value="삭제" class="btn_default btn_gray">
           &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="button" value="목록" class="btn_default btn_gray" onclick="location.replace('inquiry_list.php')">
         </form>
       </p>
    </div>
  </body>
</html>
