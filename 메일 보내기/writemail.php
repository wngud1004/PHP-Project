<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>메일 작성하기</title>
	<style>
            .btn {
              border: 2px solid gray;
              color: gray;
              background-color: white;
              padding: 8px 20px;
              border-radius: 8px;
              font-size: 20px;
              font-weight: bold;
            }
	</style>
</head>
<body>
	<form action="sendmail.php" method="post">
		<ul>
			<li>
				<label>받는 사람</label>
				<input type="email" name="mail" value="받는 사람 이메일" readonly>
			</li>
			<li>
				<label for="title">메일 제목</label>
				<input type="text" name="title">
			</li>
			<li>
				<label for="main">메일 내용</label>
				<textarea name="main" cols="40" rows="10" placeholder="보낼 내용을 입력하세요"></textarea>
			</li>
		</ul>
		<div id="buttons">
			<input type="submit" value="SEND">
			<input type="reset" value="CLEAR">
		</div>
	</form>
</body>
</html>
