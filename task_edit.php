<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
</head>

    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>

<body>
    <?php
        $pdo=new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;','LAA1553893','Todopass');
        $id = $_REQUEST['id'];
        $sql = $pdo->prepare('SELECT * FROM todos WHERE id = ?');
        $sql->execute([$id]);

        foreach ($sql as $row) : ?>

    <form action="db.php" method="post">
        <h1>タスク編集</h1>
            内容：<input type="text" name="edname" value="<?= $row['task'] ?>"><br>
            期限：<input type="date" name="eddate" value="<?= $row['due_date'] ?>"><br>
            優先度：
                <select name="edprio">
                    <option value="0" <?= $row['priority'] == 0 ? 'selected' : '' ?> >低</option>
                    <option value="1" <?= $row['priority'] == 1 ? 'selected' : '' ?> >中</option>
                    <option value="2" <?= $row['priority'] == 2 ? 'selected' : '' ?> >高</option>
                </select>
            <br>
            状態：
                <select name="edsta" >
                    <option value="todo" <?= $row['status'] === "todo" ? 'selected' : '' ?> >未完了</option>
                    <option value="done" <?= $row['status'] === "done" ? 'selected' : '' ?> >完了</option>
                </select>
            <br>

            <input type="hidden" name="id" value="<?= $row["id"] ?>">
        
        <?php endforeach ; ?>
        <input type="submit" name="edit" value="保存">
        <a href="index.php">キャンセル</a>
    </form>
    
</body>

</html>