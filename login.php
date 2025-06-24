<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="login_session.php" method="post">
        <h1>ログイン</h1>
        ユーザー名:
        <input type="text" name="user_name"><br>
        パスワード:
        <input type="password" name="password"><br>
        <button type="submit" name="login">ログイン</button>
    </form>
    <br>
    <a href="./register.php">新規登録</a>
</body>

</html>