<?php

include '../layouts/header.php';
include '../../App/DB/db.php';

$post = $db->query("SELECT * FROM posts WHERE id=" . $_GET['edit'])->fetch(PDO::FETCH_ASSOC);
// print_r($post);

if (isset($_POST['update'])) {

    if ($_FILES['image']['size'] !== 0 && $_FILES['image']['error'] == 0) :
        $name = time() . '___' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../../storage/' . $name);
    else :
        $name = $post['image'];
    endif;

    $update = $db->prepare('UPDATE posts SET 
    title = ?,
    post_text = ?,
    updated_at = ?,
    image = ?
    WHERE id = ?
    ');


    $update->execute([$_POST['title'], $_POST['post_text'], date('Y-m-d H:i:s'), $name, $_GET['edit']]);
    $_SESSION['success'] = '';
    header('location:../../../metak/Views/crud/list.php');
    // header('location:');

}

?>


<div class="container">
    <div class="card shadow mt-5 border border-dark bg-light">
        <div class="card-header">
            <a href="list.php" class="btn btn-dark float-right"> <i class="fa fa-arrow-left"> </i>
                Geri</a>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="text-danger">Post Başlığı:</label>
                    <input type="text" class="form-control" name="title" placeholder="Post başlığı..." autofocus value="<?php echo $post['title'] ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="text-danger">Post Məzmunu:</label>
                    <textarea name="post_text" id="summernote" rows="20" class="form-control" placeholder="Post məzmunu..."><?php echo $post['post_text']; ?></textarea>
                </div>
                <hr>
                <div class="form-row">

                </div>
                <hr>


                <div class="form-group">
                    <label for="" class="text-danger">Şəkil:</label>
                    <input type="file" name="image" id="">
                </div>
                <input type="hidden" name="update" id="">
                <hr>
                <button class="btn btn-success btn-block" type="submit"><i class="fa fa-plus"></i> Əlavə Et</button>
            </form>
        </div>
    </div>
</div>

















<?php include '../layouts/footer.php' ?>