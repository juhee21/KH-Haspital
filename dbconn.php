<?php
  $conn=mysql_connect("localhost","root","P@ssw0rd"); //mysql 로그인 함수(php내장 지원 함수)
  $connDB=mysql_select_db("KH_WEB",$conn); //mysql에서 데이터베이스를 선택하는 함수
  mysql_set_charset("utf8",$conn); //utf8로 설정
 ?>
