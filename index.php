<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todoリスト</h1>
    <a href="loguin.php">ログアウト</a>
    <form action = "task_add.php" method="post">
        <h2>タスク追加</h2>
        <input type="text" placeholder="タスク内容" name="task">
        <input type="date" name="due_date">
        <select name="priority">
            <option value="1">優先度(低)</option>
            <option value="2">中</option>
            <option value="3">高</option>
        </select>
        <input type="submit" value="追加">
    </form>
    <form action = "index.php" method="post">
        <h2>フィルタ/検索</h2>
        <input type="text" placeholder="キーワード">
        <select>
            <option value="1">すべて</option>
            <option value="2">1日</option>
            <option value="3">1週間</option>
            <option value="4">1か月</option>
        </select>
        <select>
            <option value="1">優先度(全て)</option>
            <option value="2">低</option>
            <option value="3">中</option>
            <option value="4">高</option>
        </select>
        <input type="submit" value="適用">
    </form>
</body>
</html>

