<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원 가입</title>
    <link rel="stylesheet" href="style_contents.css" type="text/css">
    <script type="text/javascript">
    function maxLengthCheck(object){
      if (object.value.length > object.maxLength){
    object.value = object.value.slice(0, object.maxLength);
  }
}
    function ck() {
        var en = /[^(a-zA-Z0-9)]/;
          if(en.test(document.mform.user_id.value)){
            alert('영문과 숫자만 허용합니다.');
            mform.user_id.value="";
            mform.user_id.focus();
            return false;
          }
        if(document.mform.user_id.value=="" || document.mform.user_id.value.length < 4 || document.mform.user_id.value.length > 12){
          alert('아이디를 다시 입력하세요.');
          mform.user_id.focus();
          return false;
        }
        if(document.mform.user_id.value=="root" || document.mform.user_id.value=="admin" || document.mform.user_id.value=="master" ){
          alert('사용할 수 없는 계정입니다.');
          mform.user_id.focus();
          return false;
        }
        if(document.mform.name.value=="") {
          alert('이름을 다시 입력하세요.');
          mform.name.focus();
          return false;
        }
        if(document.mform.user_pw1.value=="" || document.mform.user_pw1.value.length < 6 || document.mform.user_pw1.value.length > 20) {
          alert('비밀번호를 다시 입력하세요.');
          mform.user_pw1.focus();
          return false;
        }
        if(document.mform.user_pw1.value!=document.mform.user_pw2.value){
          alert('비밀번호가 일치하지 않습니다.');
          mform.user_pw2.focus();
          return false;
        }
        document.mform.submit();  // mform안에 있는 데이터를 동작시키겠다 라는 뜻
      }
    </script>
  </head>
  <body>
    <iframe src="head.php" width="100%" frameborder="0"></iframe>
    <div class="contents">
      <form class="mfrom" action="join_ok.php" method="post">
        <table width="550">
        <tr>
          <th colspan="2" style="background-color:#323232">
            <font style="color:white; font-size:150%">회 원 가 입</font></th>
        </tr>
        <tr>
          <th width="120px">*ID</th>
          <td>
            <input type="text" name="user_id" size="15"  maxlength="12"> &nbsp;&nbsp;&nbsp; <font style="color:red;">4~12(영문/숫자)</font>
          </td>
        </tr>
        <tr>
          <th>*비밀번호</th>
          <td>
            <input type="password" name="user_pw1" size="20" maxlength="20">
            &nbsp;&nbsp;&nbsp;<font style="color:red;">6~20(영문/숫자/특수문자)</font>
          </td>
        </tr>
        <tr>
          <th>*비밀번호 확인</th>
          <td>
            <input type="password" name="user_pw2" size="20" maxlength="20">
          </td>
        </tr>
        <tr>
          <th>*이름</th>
          <td>
            <input type="text" name="name" size="15" maxlength="15">
          </td>
        </tr>
        <tr>
          <th>*주민등록번호</th>
          <td>
            <input type="number" name="id_num1" min="1" max="2000000" maxlength="6" oninput="maxLengthCheck(this)">&nbsp;-
            <input type="password" name="id_num2" size="6" maxlength="7">
          </td>
        </tr>
        <tr>
          <th>주소</th>
          <td>
            <input type="text" name="adress" size="30" maxlength="25">
          </td>
        </tr>
        <tr>
          <th>전화번호</th>
          <td>
            <input type="number" name="tell" size="10" maxlength="11" oninput="maxLengthCheck(this)"> <font style="color:red;">- 는 제외하고 숫자만 입력</font>
          </td>
        </tr>
        <tr>
          <th>이메일</th>
          <td><input type="text" name="email" size="30" maxlength="25"></td>
        </tr>
        </table>
        <p>
          <font size="2">   *는 필수 입력 항목입니다. </font><br><br>
            <input type="submit" value="등록" class="btn_default btn_gray" onclick="ck()">
            <input type="reset" value="삭제" class="btn_default btn_gray">
          </p>
      </form>
    </div>
  </body>
</html>
