<?php
//PHP autoload file을 위한 Google Client 라이브러리 포함
require_once 'vendor/autoload.php';

//Google API 호출을 위한 Google API Client 객체 생성
$google_client = new Google_Client();

//OAuth 2.0 클라이언트 ID 설정
$google_client->setClientId('569756404015-chdep9kcdbdepuc1q9f7ef2eppoie27f.apps.googleusercontent.com');

//OAuth 2.0 클라이언트 비밀번호 설정
$google_client->setClientSecret('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');

//OAuth 2.0 Redirect URI 설정
$google_client->setRedirectUri('http://localhost/google/dashboard.php');

//Set the scopes required for the API you are going to call
$google_client->addScope('email');

//프로필 받을 권한 설정
$google_client->addScope('profile');

//웹 페이지 세션 시작
session_start();

?>
