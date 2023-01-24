<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;

  include "PHPMailer.php";
  include "SMTP.php";

  $mail = new PHPMailer();
  $mail->isSMTP();

  $mail->Host = 'smtp.naver.com';
  $mail->Port = 465;

  $mail->SMTPSecure = "ssl";

  $mail->SMTPAuth = true;

  $mail->Username = '네이버 계정 이름';

  $mail->Password = '비밀번호';

  $mail->CharSet = 'UTF-8'; // 인코딩

  $email = $_POST["mail"]; // 보내는 사람 이름

  $mail->setFrom('네이버 이메일', '보내는 이름'); 

  $mail->addReplyTo('네이버 이메일', '보내는 이름');

  $mail->addAddress($email, '받는 사람 이름');

  $subject = $_POST['title']; //제목
  $content = $_POST['main']; //내용

  $mail->Subject = $subject;

  $mail->isHTML(true);
  //html형식으로 보내기
  $mail->Body =
              "<html>
                  <body>
                    $content
                  </body>
               </html>";

  if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo '메일이 성공적으로 전송되었습니다.\\n';
      echo "<a href='.php'>돌아가기</a>";
  }
?>
