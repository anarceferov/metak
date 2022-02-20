<?php

include '../layouts/header.php';

?>


<div class="container">
    <div class="card shadow mt-5 border border-dark bg-light">
        <div class="card-header">
            <a href="list.php" class="btn btn-dark float-right"> <i class="fa fa-arrow-left"> </i>
                Geri</a>
        </div>
        <div class="card-body">
            <form action="../../App/Controller/PostController.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="text-danger">Post Başlığı:</label>
                    <input type="text" class="form-control" name="title" placeholder="Post başlığı..." autofocus>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="text-danger">Post Məzmunu:</label>
                    <textarea name="post_text" id="summernote" rows="20" class="form-control" placeholder="Post məzmunu..."></textarea>
                </div>
                <hr>
                <div class="form-row">

                </div>
                <hr>


                <div class="form-group">
                    <label for="" class="text-danger">Şəkil:</label>
                    <input type="file" name="image" id="">
                </div>
                <input type="hidden" name="insert" id="">
                <hr>
                <button class="btn btn-success btn-block" type="submit"><i class="fa fa-plus"></i> Əlavə Et</button>
            </form>
        </div>
    </div>
</div>

















<?php include '../layouts/footer.php' ?>