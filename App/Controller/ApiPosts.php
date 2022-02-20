<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../DB/db.php';


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo 'ferfrfr';
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    try {
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



        $insert->execute([$_POST['title'] ?? '', $_POST['post_text'] ?? '', date('Y-m-d H:i:s'), $name ?? '']);

        // header('Content-type: application/json');
        echo json_encode('success');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
