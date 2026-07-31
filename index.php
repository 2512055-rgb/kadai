<?php
// エラー表示を有効化
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $song_title = $_POST['song_title'] ?? '';

    if (!empty($name) && !empty($song_title)) {
        $stmt = $conn->prepare("INSERT INTO participants (name, song_title) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $song_title);
        if ($stmt->execute()) {
            $message = "申込みが完了しました！";
        } else {
            $message = "エラーが発生しました。";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カラオケ大会 参加申し込み</title>
</head>
<body>
    <h1>カラオケ大会 参加申し込み</h1>
    <?php if ($message): ?>
        <p style="color: green;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <p>お名前: <input type="text" name="name" required></p>
        <p>歌う曲名: <input type="text" name="song_title" required></p>
        <button type="submit">送信する</button>
    </form>
    <br>
    <a href="admin.php">【主催者用】参加者一覧はこちら</a>
</body>
</html>
