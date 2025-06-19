<?php
$pdo=new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;','LAA1553893','Todopass');
$sql=$pdo->prepare('insert into todos values(?, ?, ?, ?, ?, current_timestamp)');
$sql->execute([$_SESSION['user']['id'], $_POST['task'], $_POST['status'], $_POST['due_date'], $_POST['priority']]);
header("Location: index.php");
?>