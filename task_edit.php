<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<body>
    <?php
    $pdo = new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;', 'LAA1553893', 'Todopass');
    $id = $_REQUEST['id'];
    $sql = $pdo->prepare('SELECT * FROM todos WHERE id = ?');
    $sql->execute([$id]);

    foreach ($sql as $row) : ?>

        <form action="db.php" method="post" class="edit-form">
            <h1>タスク編集</h1>
            <dl>
                <div class="item">
                    <dt>内容</dt>
                    <dd><input type="text" name="edname" value="<?= $row['task'] ?>"></dd>
                </div>
                <div class="item">
                    <dt>期限</dt>
                    <dd><input type="date" name="eddate" value="<?= $row['due_date'] ?>"></dd>
                </div>
                <div class="item">
                    <dt>優先度</dt>
                    <dd>
                        <select name="edprio">
                            <option value="0" <?= $row['priority'] == 0 ? 'selected' : '' ?>>低</option>
                            <option value="1" <?= $row['priority'] == 1 ? 'selected' : '' ?>>中</option>
                            <option value="2" <?= $row['priority'] == 2 ? 'selected' : '' ?>>高</option>
                        </select>
                    </dd>
                </div>
                <div class="item">
                    <dt>状態</dt>
                    <dd>
                        <select name="edsta">
                            <option value="todo" <?= $row['status'] === "todo" ? 'selected' : '' ?>>未完了</option>
                            <option value="done" <?= $row['status'] === "done" ? 'selected' : '' ?>>完了</option>
                        </select>
                    </dd>
                </div>
            </dl>
            <input type="hidden" name="id" value="<?= $row["id"] ?>">

        <?php endforeach; ?>
        <input type="submit" name="edit" value="保存">
        <a href="index.php">キャンセル</a>
        </form>

</body>

</html>