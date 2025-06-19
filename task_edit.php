<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
</head>

<body>
    <form action="index.php">
        <h1>タスク編集</h1>
            内容：<input type="text" name="edname"><br>
            期限：<input type="date" name="eddate"><br>
            優先度：<input type="select" name="edprio"><br>
            状態：<input type="select" name="edsta">
        <input type="submit">
    </form>
</body>

</html>