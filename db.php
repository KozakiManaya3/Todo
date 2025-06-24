<?php
session_start();
$pdo=new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;','LAA1553893','Todopass');
if (isset($_POST['login'])) {
    $sql = $pdo->prepare('select * from users where username=? and password=?');
    $sql->execute([$_POST['user_name'], $_POST['password']]);
    foreach ($sql as $row) {
        $_SESSION['user'] = [
            'id' => $row['id'],
            'name' => $row['username']
        ];
    }
    if (isset($_SESSION['user'])) {
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
} else if (isset($_POST['register'])) {
    $sql = $pdo->prepare('insert into users values(null,?,?,current_timestamp)');
    $sql->execute([$_POST['username'], $_POST['password']]);
    header("Location: login.php");
} else if (isset($_POST['edit'])) {
    $sql = $pdo->prepare('update todos set task=?, status=?, due_date=?, priority=? where id=?');
    $sql->execute([$_POST['edname'], $_POST['edsta'], $_POST['eddate'], $_POST['edprio'], $_POST['id']]);
    header("Location: index.php");
}
