<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'appuser';        // 'root' から 'appuser' に変更
$pass = 'password123';    // '' から 'password123' に変更
$dbname = 'karaoke_db';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}
?>
