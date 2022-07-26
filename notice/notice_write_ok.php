<?php

  $b_name=$_POST["name"];
  $b_pw=$_POST["notice_pw"];
  $b_email=$_POST["email"];
  $b_sub=$_POST["notice_sub"];
  $b_cont=$_POST["notice_cont"];

  $f_error=$_FILES["att_file"]["error"]; //파일에 에러가 있는지 없는 지
    //(0:성공, 1:php에서 제한한 파일크기보다 크다, 2:html form에서 지원하는 파일 크기보다 크다, 3:파일의 일부분만 전송되었다,
    //  4:파일전송이 없는 경우, 6:임시폴더가 없는 경우, 7:파일쓰기 실패, 8:확장자로 인한 업로드 금지)
    if ($f_error == 0) { //성공
      $f_name=$_FILES["att_file"]["name"];
      $f_path="upload/".$f_name;
      $f_tmp=$_FILES["att_file"]["tmp_name"];
      $f_size=$_FILES["att_file"]["size"];

      if (preg_match("/\.html|\.php|\.asp|\.jsp|\.exe|\.htaccess/i", $f_name)) {
        echo "<script>
          alert('요청한 첨부파일은 업로드가 불가능합니다.');
          history.back();
        </script>";
        exit();
      }

      $f_name_only1=substr($f_name,0,strrpos($f_name,'.')); //substr(원본문자, 시작위치, 글자수) //글자수는 생략 가능-끝까지 다 가져온다
      //파일 이름만, strrpos:원본 데이터에서 .이라는 문자가 나오기 전까지의 글자수를 세주는 함수
      $f_name_ext= substr($f_name,strrpos($f_name,'.'));
      //파일 확장자만

      $f_name_only2=$f_name_only1;

      for ($i=1; is_file($f_path); $i++) {
        $f_name_only1=$f_name_only2."(".$i.")";
        $f_path="./upload/".$f_name_only1.$f_name_ext;
      }
      $f_name=$f_name_only1.$f_name_ext;

    } else if($f_error != 4){ //에러코드
      echo "<script>
        alert('파일 업로드 실패($f_error)');
        history.back();
      </script>";
      exit();
    }

  require "../dbconn.php";

  $strSQL="insert into notice set n_name='$n_name', n_password='$n_pw', n_email='$n_email', n_subject='$n_sub', n_content='$n_cont', writeDate=now()";
  if ($f_error == 0) {
      $strSQL.=", fileName='$f_name', fileSize='$f_size'";
      $f_rs=move_uploaded_file($f_tmp,$f_path);
    }
  $rs=mysql_query($strSQL,$conn);

  if($rs){
    echo "<script>
      alert('글이 성공적으로 등록되었습니다');
      location.replace('notice_list.php');
    </script>";
  }
  else{
    echo "<script>
      alert('글을 등록하는데 실패하였습니다');
      history.back();
    </script>";
  }
 ?>
