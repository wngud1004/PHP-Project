<?php
# 데이터 가져오기
$uname = $_POST['uname'];
$tall = $_POST['tall'];
$weight = $_POST['weight'];
$blood = $_POST['blood'];

//echo "$uname : $tall : $weight : $blood";
# bmi 계산
$tall /= 100;
$bmi = round($weight / ($tall ** 2), 1);
//echo $bmi;

# 결과 보내기
echo "<h1>BMI 지수 = $bmi</h1>";
if($bmi < 18.5) $desc = "저체중";
elseif($bmi >= 18.5 && $bmi <= 24.9) $desc = "정상체중";
elseif($bmi >= 25 && $bmi <= 29.9) $desc = "과체중";
elseif($bmi >= 30 && $bmi <= 34.9) $desc = "비만";
else $desc = "고도비만";

echo "<h2>{$uname}님은 {$desc}입니다.</h2>";
echo "<h3>지수설명</h3>";
echo "<p><img src='bmi.jpg'></p>";
echo "<h3>{$blood}형의 건강정보</h3>";
echo "<a href='http://dongascience.donga.com/news.php?idx=31251'>[인류와 질병] O형의 비밀</a>";

?>
