<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="../style_contents.css" type="text/css">
  </head>
  <body>
  <iframe src="../main/head.php" width="100%" frameborder="0"></iframe>
    <div id="login_contents" class="contents">
      <form class="" action="login_check.php" method="post">
        <table>
          <tr>
            <th colspan="2" style="background-color:#323232">
              <font style="color:white; font-size:150%;">LOGIN </font></th>
          </tr>
          <tr>
            <th>ID</th>
            <td><input type="text" name="user_id" style="border:0" maxlength="12"></td>
          </tr>
          <tr>
            <th>PASSWORD</th>
            <td><input type="password" name="user_pw" style="border:0" maxlength="20"></td>
          </tr>
        </table>
        <p>
          <input type="submit" value="로그인" class="btn_default btn_gray">
        </p>
      </form>
    </div>
  </body>
</html>
