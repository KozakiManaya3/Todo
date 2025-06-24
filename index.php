<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todoリスト</h1>
    <a href="loguin.php">ログアウト</a>
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
    <table>
        <thead>
            <th>状態</th>
            <th>タスク</th>
            <th>期限</th>
            <th>優先度</th>
            <th>操作</th>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"></td>
                <td>Githubの課題</td>
                <td>2025-06-10</td>
                <td>高</td>
                <td>
                    <a href="task_edit.php">編集</a>
                    <a href="task_delete.php">削除</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>