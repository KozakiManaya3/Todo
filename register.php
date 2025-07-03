<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-register">
        <h1>ユーザー登録</h1>
        <form action="db.php" method="post">
            <p>ユーザー名</p>
            <input type="text" name="username" class="login-register-input"><br>
            <p>パスワード</p>
            <input type="password" name="password" class="login-register-input"><br>
            <button type="submit" name="register">登録</button><br>
        </form>
        <br>
        <a href="./login.php">ログインはこちら</a>
    </div>
</body>

</html>