<?php
$pdo = new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;', 'LAA1553893', 'Todopass');
$id = $_REQUEST['id'];
$sql = $pdo->prepare('select * from todos where id=?');
$sql->execute([$id]);
foreach ($sql as $row) {
    $status = $row['status'] == 'todo' ? 'done' :'todo';
}
$sql = $pdo->prepare('update todos status=? where id=?');
$sql->execute([$status,$id]);

header("Location: index.php");
?>