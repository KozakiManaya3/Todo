<?php
session_start();
$pdo = new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;', 'LAA1553893', 'Todopass');
$pri = ['低', '中', '高'];
$all_task = 0;
$done_task = 0;
$sql = $pdo->prepare('select count(*) as  alltask, sum(status = "done") as donetask from todos where user_id = ?');
$sql->execute([$_SESSION['user']['id']]);
foreach($sql as $row){
    $all_task = $row['alltask'];
    $done_task = $row['donetask'];
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Todoリスト</h1>
    <p><?= $_SESSION['user']['name'] ?>さん</p>
    <a href="logout.php">ログアウト</a>
    <p>進捗:<?= $all_task == 0 ? 0 : round($done_task/$all_task * 100) ?>%</p>
    <meter min="0" max="100" value="<?= $all_task == 0 ? 0 : $done_task/$all_task * 100 ?>"></meter>
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
        <input type="text" placeholder="キーワード" name="keyword">
        <select name="date">
            <option value="すべて">すべて</option>
            <option value="1">1日</option>
            <option value="7">1週間</option>
            <option value="31">1か月</option>
        </select>
        <select name="priority">
            <option value="すべて">優先度(全て)</option>
            <option value="0">低</option>
            <option value="1">中</option>
            <option value="2">高</option>
        </select>
        <input type="submit" value="適用" name="search">
    </form>
    <?php
    if (isset($_REQUEST['search'])) {
        if ($_POST['date'] == 'すべて' && $_POST['priority'] == 'すべて') {
            $sql = $pdo->prepare('select * from todos where task like ? and user_id = ?');
            $sql->execute(['%' . $_POST['keyword'] . '%', $_SESSION['user']['id']]);
        } else if ($_POST['date'] !== 'すべて' && $_POST['priority'] == 'すべて') {
            $sql = $pdo->prepare('select * from todos where task like ? and datediff(due_date, current_date)<=? and user_id=?');
            $sql->execute(['%' . $_POST['keyword'] . '%', $_POST['date'], $_SESSION['user']['id']]);
        } else if ($_POST['date'] == 'すべて' && $_POST['priority'] !== 'すべて') {
            $sql = $pdo->prepare('select * from todos where task like ? and priority = ? and user_id=?');
            $sql->execute(['%' . $_POST['keyword'] . '%', $_POST['priority'], $_SESSION['user']['id']]);
        } else if ($_POST['date'] !== 'すべて' && $_POST['priority'] == 'すべて') {
            $sql = $pdo->prepare('select * from todos where task like ? and datediff(due_date, current_date)<=? and  priority = ? and user_id=?');
            $sql->execute(['%' . $_POST['keyword'] . '%', $_POST['date'], $_POST['priority'], $_SESSION['user']['id']]);
        }
    } else {
        $sql = $pdo->prepare('select * from todos where user_id = ?');
        $sql->execute([$_SESSION['user']['id']]);
    }
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
                    <td><span class="<?= $row['status'] == 'done' ? "done" : ""?>"><?= $row['task'] ?></span></td>
                    <td><span class="<?= $row['status'] == 'done' ? "done" : ""?>"><?= $row['due_date'] ?></span></td>
                    <td><span class="<?= $row['status'] == 'done' ? "done" : ""?>"><?= $pri[$row['priority']] ?></span></td>
                    <td>
                        <a href="task_edit.php?id=<?= $row['id'] ?>" onclick="return confirm('削除しますか？')'">編集</a>
                        <a href="task_delete.php?id=<?= $row['id'] ?>">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>