<?php
$pdo=new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;','LAA1553893','Todopass');
$sql=$pdo->prepare('delete from todos where id=?');
$sql->execute([$_REQUEST['id']]);
header("Location: index.php");
?>