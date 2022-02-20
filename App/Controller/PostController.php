<?php
session_start();
include '../DB/db.php';

htmlspecialchars(trim($_REQUEST['POST']));

function sec($val)
{
    return htmlspecialchars(trim($val));
}

if (isset($_POST['insert'])) {

    if ($_FILES['image']['size'] !== 0 && $_FILES['image']['error'] == 0) :

        $name = time() . '___' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../../storage/' . $name);

    endif;
    $insert = $db->prepare('INSERT INTO posts SET 
    title = ?,
    post_text = ?,
    created_at = ?,
    image = ?
    ');



    $insert->execute([sec($_POST['title']), $_POST['post_text'], date('Y-m-d H:i:s'), $name]);
    $_SESSION['success'] = '';
    header('location:../../../metak/Views/crud/list.php');
    header('location:../../../../Views/crud/list.php');
}


if (isset($_GET['delete'])) {


    $query = $db->prepare('DELETE FROM posts WHERE id = ?');

    $query->execute([
        $_GET['delete']
    ]);

    $_SESSION['success'] = '';
    header('location:../../../metak/Views/crud/list.php');
}
