<?php
require_once 'db.php';

$result = $conn->query("SELECT * FROM participants ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>【主催者用】参加者一覧</title>
</head>
<body>
    <h1>参加者一覧</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>曲名</th>
            <th>申込日時</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['song_title']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="index.php">申し込み画面に戻る</a>
</body>
</html>
