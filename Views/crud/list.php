<?php
include '../layouts/header.php';
include '../../App/DB/db.php';

$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);


?>


<?php if (isset($_SESSION['success'])) : ?>
    <div class="container mt-5">
        <div class="alert alert-success shadow border border-success text-center">
            <i class="fa fa-check mr-2"></i>
            <?php echo 'Əməliyyat uğurludur';
            unset($_SESSION['success']); ?>

        </div>
    </div>
<?php endif ?>


<div class="card mt-5">
    <div class="card-header bg-light mt-2">
        <a href="./create.php" class="btn btn-success float-right"> <i class="fas fa-plus"></i> Əlavə et</a>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="border: 3px solid black;">
                    <thead class="text-center border border-dark">
                        <tr class="bg-secondary text-white">
                            <th scope="col">No</th>
                            <th scope="col">Şəkil</th>
                            <th scope="col">Başlıq</th>
                            <th scope="col">Yaradılma Tarixi</th>
                            <th scope="col">Yenileme Tarixi</th>
                            <th scope="col">Prosses</th>
                        </tr>
                    </thead>
                    <?php $i = 0; ?>
                    <tbody class="text-center">
                        <?php foreach ($posts as $post) : ?>
                            <tr>
                                <th class="align-middle">
                                    <div class="badge badge-pill badge-dark">
                                        <?php $i += 1;
                                        echo $i; ?>
                                    </div>
                                </th>
                                <th class="align-middle" width="220"> <img src="<?php echo '../../storage/' . $post['image'] ?>" alt="" style='max-width:100%' height='auto' class="img-fluid"> </th>
                                <th class="align-middle"> <?php echo $post['title'] ?> </th>

                                <th class="align-middle" title="<?php echo $post['created_at'] ?>"> <?php echo $post['created_at'] ?></th>
                                <th class="align-middle" title="<?php echo $post['created_at'] ?>"> <?php echo $post['updated_at'] ?? 'Yenilənməyib' ?></th>
                                <td class="align-middle">
                                    <a href="../crud/show.php?show=<?php echo $post['id'] ?>" class="btn btn-info d-inline btn-sm" type="button"><i class="fas fa-eye"></i></a>
                                    <a href="../crud/edit.php?edit=<?php echo $post['id'] ?>" class="btn btn-info d-inline btn-sm" type="button"><i class="fas fa-edit"></i></a>
                                    <a href="../../App/Controller/PostController.php?delete=<?php echo $post['id'] ?>" class="btn btn-danger d-inline btn-sm" type="button"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



















<script>
    setTimeout(function() {

        $(".alert").hide("2000")

    }, 3000);
</script>

<?php include '../layouts/footer.php' ?>