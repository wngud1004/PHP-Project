<?php
# form 데이터 가져오기
$name = $_GET['name'];
$paydate = $_GET['paydate'];
$payrate = $_GET['payrate'];
$day = $_GET['day'];
$night = $_GET['night'];

$pay = 0;
$bonus = ($night > 3)? ($night - 3) * $payrate * 0.2 : 0;
$pay = ($day + $night) * $payrate;
$pay += $bonus;

echo "<h3>$name</h3>";
echo "<h3>$paydate</h3>";
echo "<h3>{$pay}원({$bonus}원)</h3>";

?>
