<?php
include '../layouts/header.php';
include '../../App/DB/db.php';

$post = $db->query("SELECT * FROM posts WHERE id =" . $_GET['show'])->fetch(PDO::FETCH_ASSOC);


?>

<div class="container mb-5">

    <div class="card mt-5 border border-dark">
        <div class="card-header bg-light mt-2">
            <h1 class="text-center"><?php echo $post['title'] ?></h1>
            <img src="../../storage/<?php echo $post['image'] ?>" alt="" style="width: 100%;">

        </div>
        <div class="card-body">
            <div class="card-body">
                <p>
                    <?php echo $post['post_text'] ?>
                </p>
            </div>
        </div>

        <div class="card-footer">
            <h3 class="text-center">
                <?php echo $post['created_at'] ?>
            </h3>
        </div>
    </div>


</div>



<?php include '../layouts/footer.php' ?>