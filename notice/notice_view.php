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
      <?php
        session_start();
        require "../dbconn.php";

        $r_num=$_GET["num"];
        $strSQL="update notice set viewCount=viewCount+1 where n_number='".$r_num."';";
        mysql_query($strSQL,$conn);

        $strSQL="select * from notice where n_number='".$r_num."';";
        $rs=mysql_query($strSQL,$conn);
        $rs_arr=mysql_fetch_array($rs);

        $n_num=$rs_arr["n_number"];
        $n_name=$rs_arr["n_name"];
        $n_email=$rs_arr["n_email"];
        $n_sub=$rs_arr["n_subject"];
        $n_cont=$rs_arr["n_content"];
        $n_no=$rs_arr["viewCount"];
        $n_date=$rs_arr["writeDate"];
        $n_fname=$rs_arr["fileName"];
        $n_fsize=$rs_arr["fileSize"];
       ?>
      <table width="700" border="1">
        <tr>
          <th colspan="4" style="background-color:#323232; color:white; font-size:150%">내 용 보 기</th>
        </tr>
        <tr>
          <th>이름</th>
          <td><?=$n_name?></td>
          <th>등록일</th>
          <td><?=$n_date?></td>
        </tr>
        <tr>
          <th>이메일</th>
          <td><?=$n_email?></td>
          <th>조회수</th>
          <td><?=$n_no?></td>
        </tr>
        <tr>
          <th>제목</th>
          <td colspan="3"><?=$n_sub?></td>
        </tr>
        <tr>
          <th>내용</th>
          <td colspan="3" style="padding:30px 0;"><?=$n_cont?></td>
        </tr>
        <tr>
          <th>첨부파일</th>
          <td colspan="3">
            <?php
            if($n_fname!=""){ ?>
              <a href="notice_file_download.php?filename=<?=$n_fname;?>"><?=$n_fname;?>&nbsp;&nbsp;(<?=$n_fsize;?>byte)</a>
            <?php  } ?>
          </td>
        </tr>
      </table>
      <br>
       <p>
         <form action="notice_delete.php?num=<?=$n_num?>" method="post">
           비밀번호 <input type="password"  name="n_pass" size="20">
           <input type="submit" value="삭제" class="btn_default btn_gray">
           &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="button" value="목록" class="btn_default btn_gray" onclick="location.replace('notice_list.php')">
         </form>
       </p>
    </div>
  </body>
</html>
