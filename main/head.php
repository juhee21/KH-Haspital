<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>KH Hospital</title>
    <link rel="stylesheet" href="../style_head.css" type="text/css">
  </head>
  <body>
    <?php session_start(); ?>
    <div id="area_header">
      <h1>KH Hospital</h1>
    </div>
    <div id="area_menu">
      <a href="index.php" target="_parent"> 홈 </a> |
      <a href="../notice/notice_list.php" target="_parent"> 공지사항 </a> |
      <a href="../inquiry/inquiry_list.php" target="_parent"> 문의게시판 </a> |

      <?php if(!$_SESSION[user_id]):?>
        <a href="../login/login.php" target="_parent"> 로그인 </a> |
        <a href="../join/join.php" target="_parent"> 회원가입 </a>

     <?php else: ?>
       <a href="../info/info.php" target="_parent"><?=$_SESSION[name]?>님 정보</a> |
       <a href="../login/logout.php" target="_parent">로그아웃</a>
     <?php endif; ?>
    </div>
  </body>
</html>
