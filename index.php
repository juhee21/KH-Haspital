<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>KH Hospital</title>
    <link rel="stylesheet" href="style_contents.css" type="text/css">
  </head>
  <body>
    <iframe src="head.php" width="100%" frameborder="0"></iframe>
    <div id="main_contents" class="contents">
      <?php
        session_start();
        if($_SESSION[user_id])
        echo $_SESSION[name]."님";
        ?>
      <img src="image.png" width="100%" height="100%">
    </div>
  </body>
</html>
