<?php

//Google 구성 파일 포함
include('gconfig.php');

//OAuth access token 재설정
$google_client->revokeToken();

//전체 세션 데이터 삭제
session_destroy();

//index.php 페이지로 redirect
header('location:index.php');

?>
