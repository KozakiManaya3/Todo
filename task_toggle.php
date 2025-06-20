<?php
$pdo = new PDO('mysql:host=mysql322.phy.lolipop.lan;dbname=LAA1553893-todo;', 'LAA1553893', 'Todopass');
if (isset($_POST['search'])) {
    if ($_POST['day'] !== 'すべて' && $_POST['priority'] !== 'すべて') {
        // 期限が選択されている かつ 優先度も選択されている
        $sql = $pdo->prepare('select * from todos where task like ? and (due_date-current_date)<=? and priority=? and user_id=?');
        $sql->execute(['%' . $_POST['kerword'] . '%', $_POST['date'], $_POST['priority'], $_SESSION['user']['id']]);
    } else if ($_POST['day'] !== 'すべて' && $_POST['prioriry'] == 'すべて') {
        // 期限だけ選択されている
        $sql = $pdo->prepare('select * from todos where task like ? and (due_date-current_date)<=? and user_id=?');
        $sql->execute(['%' . $_POST['kerword'] . '%', $_POST['date'], $_SESSION['user']['id']]);
    } else if ($_POST['day'] == 'すべて' && $_POST['prioriry'] !== 'すべて') {
        // 優先度だけ選択されている
        $sql = $pdo->prepare('select * from todos where task like ? and priority=? and user_id=?');
        $sql->execute(['%' . $_POST['kerword'] . '%', $_POST['priority'], $_SESSION['user']['id']]);
    } else {
        // キーワードだけ
        $sql = $pdo->prepare('select * from todos where task like ? user_id=?');
        $sql->execute(['%' . $_POST['kerword'] . '%', $_SESSION['user']['id']]);
    }
} else {
    $sql = $pdo->prepare('select * from todos where user_id=?');
    $sql->execute([$_SESSION['user']['id']]);
}
foreach ($sql as $row) :?>
<table>
    <thead>
        <tr>
            <th>状態</th>
            <th>タスク</th>
            <th>期限</th>
            <th>優先度</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="checkbox"></td>
            <td><?= $row['task'] ?></td>
            <td><?= $row['due_date'] ?></td>
            <td><?= $row['priority'] ?></td>
            <td>
                <a href="task_edit.php?id=<?= $row['id'] ?>">編集</a>
                <a href="task_delete.php?id=<?= $row['id'] ?>">削除</a>
            </td>
        </tr>
    </tbody>
</table>
<?php endforeach; ?>