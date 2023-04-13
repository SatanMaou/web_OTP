<?php
$hostname = 'localhost';
$username = 'id19950290_otp_pdf';
$password = 'N8|7z!6dIT5>Yv=2';
$dbname = "id19950290_otp_yte";
// $username = 'root';
// $password = '';
// $dbname = 'otp_yte';
$port = 3306;
$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);

if (!$conn) {
//  die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
//echo 'Kết nối thành công'; //xuat ra man hinh web
mysqli_set_charset($conn,"utf8");//bo dau tieng viet
?>