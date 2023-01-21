<?php
  //Google 구성 파일 포함
  include('gconfig.php');

  if(!isset($_SESSION['access_token'])) {
    //사용자 권한을 얻기 위한 위한 URL 생성
    $google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="https://www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png" /></a>';
  } else {
    // 권한을 얻었다면 dashboard.php으로 이동
    header("Location: dashboard.php");
  }
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHP Login With Google</title>
  </head>
  <body>
    <?php
      //버튼 연결
      echo '<div align="center">'. $google_login_btn . '</div>';
    ?>
  </body>
</html>
