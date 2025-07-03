<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-register">
        <form action="db.php" method="post">
            <h1>ログイン</h1>
            <p>ユーザー名</p>
            <input type="text" name="user_name" value="Kozaki" class="login-register-input">
            <p>パスワード</p>
            <input type="password" name="password" value="aaa" class="login-register-input">
            <button type="submit" name="login">ログイン</button>
        </form>
        <br>
        <a href="./register.php">新規登録</a>
    </div>
</body>

</html>