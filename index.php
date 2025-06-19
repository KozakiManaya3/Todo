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
        <input type="text" placeholder="タスク内容">
        <input type="date">
        <select>
            <option>
                優先度(低)
            </option>
            <option>
                中
            </option>
            <option>
                高
            </option>
        </select>
        <input type="submit" value="追加">
    </form>
    <form action = "index.php" method="post">
        <h2>フィルタ/検索</h2>
        <input type="text" placeholder="キーワード">
        <select>
            <option>
                すべて
            </option>
            <option>
                1日
            </option>
            <option>
                1週間
            </option>
            <option>
                1か月
            </option>
        </select>
        <select>
            <option>
                優先度(全て)
            </option>
            <option>
                低
            </option>
            <option>
                中
            </option>
            <option>
                高
            </option>
        </select>
        <input type="submit" value="適用"
    </form>
</body>
</html>
