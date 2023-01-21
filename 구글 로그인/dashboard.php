<?php

//Google 구성 파일 포함
include('gconfig.php');

//토큰이 없다면 index.php으로 이동
if($_SESSION['access_token'] == '') {
  header("Location: index.php");
} 
//이 $_GET["code"] 변수 값은 사용자가 Google 계정에 로그인한 후 PHP 스크립트로 리디렉션된 후 이 변수 값이 수신
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"])) {
  //유효한 인증 토큰을 위해 코드 교환을 시도
  //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 if(!isset($token['error'])) {//인증 토큰을 가져오는 동안 오류가 발생했는지 확인. 오류가 발생하지 않으면 코드 블록이 실행

  //요청에 사용되는 access token 설정
  $google_client->setAccessToken($token['access_token']);

  //access_token 값을 세션 변수에 저장
  $_SESSION['access_token'] = $token['access_token'];

  //Google Service OAuth 2 class 객체 생성
  $google_service = new Google_Service_Oauth2($google_client);

  //Google에서 user profile data 가져오기
  $data = $google_service->userinfo->get();

  //프로필 데이터 가져오면서 세션변수에 저장
  if(!empty($data['given_name'])) // 성
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name'])) // 이름
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email'])) // 이름
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender'])) // 성별
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture'])) // 프로필 사진
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

?>
<html>
 <head>
  <meta charset="utf-8" />
  <title>PHP Login using Google Account</title>
 </head>
 <body>
  <div class="container">
     <div class="card">
      <div class="card-header">
        You have Successfully Logged In With Google
      </div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $_SESSION['user_first_name'].' '.$_SESSION['user_last_name']?></h5>
        <p class="card-text">Email:- <?php echo $_SESSION['user_email_address']; ?> </p>
        <img class="user-image" src="<?php echo $_SESSION["user_image"]; ?>" alt="Card image cap">
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
 </body>
</html>
