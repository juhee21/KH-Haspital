<?php
  function ge_st($length) {
    $char="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_";
    $st_ge="";
    $num=$length;
    while ($num--) {
      $st_ge.=$char[mt_rand(0,strlen($char)-1)];
    }
    return $st_ge;
  }
  /*Anti-Forgery Token : 랜덤한 값을 토큰으로 만들어 지정된 위치에서 접속했을 때만 토큰을 부여하고 토큰이 일치하는 경우만 정보변경이 가능*/
 ?>
