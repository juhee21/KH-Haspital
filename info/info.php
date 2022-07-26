<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원 정보 변경</title>
      <link rel="stylesheet" href="../style_contents.css" type="text/css">
      <script type="text/javascript">
        function ck() {
          if(document.mform.user_pw1.value=="" || document.mform.user_pw1.value.length < 6 || document.mform.user_pw1.value.length > 12 ) {
            alert('비밀번호를 다시 입력하세요');
            mform.user_pw1.focus();
            return false;
          }
          if(document.mform.user_pw1.value!=document.mform.user_pw2.value) {
            alert('비밀번호가 일치하지 않습니다.');
            mform.user_pw1.focus();
            return false;
          }
          document.mform.submit();
        }
      </script>
  </head>
  <body>
    <iframe src="../main/head.php" width="100%" frameborder="0"></iframe>
    <div class="contents">
      <?php
      session_start();

      require "../dbconn.php";

      $strSQL="select * from patient where p_id='$_SESSION[user_id]'";
      $rs=mysql_query($strSQL,$conn);
      $rs_arr=mysql_fetch_array($rs);

      if($_GET["ch"]==1) echo "<h5>성공적으로 변경되었습니다.</h5>";
      else if($_GET["ch"]==2) echo "<h5>회원정보를 변경하지 못하였습니다.</h5>";
      ?>
      <form name="mform" action="info_change.php" method="post">
        <table width="600">
          <tr>
            <th colspan="2" style="background-color:#323232">
              <font style="color:white; font-size:150%;">회 원 정 보</font></th>
          </tr>
          <tr>
            <th width="120px">회원번호</th>
            <td><?=$rs_arr[p_index]?></td>
          </tr>
          <tr>
            <th width="120px">*ID</th>
            <td><?=$rs_arr[p_id]?></td>
          </tr>
          <tr>
            <th>*비밀번호</th>
              <td><input type="password" name="user_pw1" size="20">&nbsp;&nbsp;&nbsp;<font style="color:red;">6~20(영문/숫자/특수문자)</font></input></td>
          </tr>
          <tr>
            <th>*비밀번호 확인</th>
            <td><input type="password" name="user_pw2" size="20"></td>
          </tr>
          <tr>
            <th>이 름</th>
            <td><?=$rs_arr[p_name]?></td>
          </tr>
          <tr>
            <th>진료과</th>
            <td><?=$rs_arr[p_department]?></td>
          </tr>
          <tr>
            <th>성 별</th>
            <td><?=$rs_arr[p_sex]?></td>
          </tr>
          <tr>
            <th>나 이</th>
            <td><input type="number" name="age" size="20" value="<?=$rs_arr[p_age]?>"></td>
          </tr>
          <tr>
            <th>주민등록번호</th>
            <td><?=$rs_arr[p_RRN]?></td>
          </tr>
          <tr>
            <th>주소</th>
            <td><input type="text" name="address" size="30" value="<?=$rs_arr[p_addr]?>"></td>
          </tr>
          <tr>
            <th>전화번호</th>
            <td><input type="text" name="tel" size="20" value="<?=$rs_arr[p_tel]?>"></td>
          </tr>
          <tr>
            <th>EMAIL</th>
            <td><input type="text" name="email" size="30" value="<?=$rs_arr[p_email]?>"></td>
          </tr>
        </table>
        <p>
          <font size="2">*는 필수 입력 항목입니다. </font> <br><br>
          <input type="submit" value="수정" class="btn_default btn_gray" onclick="ck();">
          <input type="reset" value="삭제" class="btn_default btn_gray">
        </p>
      </form>
    </div>
  </body>
</html>
