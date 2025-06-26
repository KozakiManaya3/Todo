<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todoリスト</h1>
    <a href="logout.php">ログアウト</a>
    <form action="task_add.php" method="post">
        <h2>タスク追加</h2>
        <input type="text" placeholder="タスク内容" name="task">
        <input type="date" name="due_date">
        <select name="priority">
            <option value="0">優先度(低)</option>
            <option value="1">中</option>
            <option value="2">高</option>
        </select>
        <input type="submit" value="追加">
    </form>
    <form action="index.php" method="post">
        <h2>フィルタ/検索</h2>
        <input type="text" placeholder="キーワード">
        <select>
            <option value="すべて">すべて</option>
            <option value="1">1日</option>
            <option value="7">1週間</option>
            <option value="31">1か月</option>
        </select>
        <select>
            <option value="すべて">優先度(全て)</option>
            <option value="0">低</option>
            <option value="1">中</option>
            <option value="2">高</option>
        </select>
        <input type="submit" value="適用">
    </form>
    <?php
    $pdo = new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;', 'LAA1553893', 'Todopass');
    $pri = ['低', '中', '高'];
    $sql = $pdo->prepare('select * from todos where user_id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    ?>
    <table>
        <thead>
            <th>状態</th>
            <th>タスク</th>
            <th>期限</th>
            <th>優先度</th>
            <th>操作</th>
        </thead>
        <tbody>
            <?php foreach ($sql as $row) : ?>
                <tr>
                    <td><input type="checkbox" <?= $row['status'] == 'done' ? 'checked' : '' ?> onclick="location.href='task_toggle.php?id=<?= $row['id'] ?>'"></td>
                    <td><?= $row['task'] ?></td>
                    <td><?= $row['due_date'] ?></td>
                    <td><?= $pri[$row['priority']] ?></td>
                    <td>
                        <a href="task_edit.php?id=<?= $row['id'] ?>">編集</a>
                        <a href="task_delete.php?id=<?= $row['id'] ?>">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>