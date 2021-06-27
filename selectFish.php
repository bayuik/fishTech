<?php
    include "components/connection.php";
    $idCategory = $_GET['idCategory'];
    $resultFish = resultFish($idCategory);
    $category = category($idCategory);

?>
<?php include 'components/navbar.php' ?>
<section class="container">
    <nav class="pt-5">
        <ol class="breadcrumb mt-5" id="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><?= $category["NAMA_KATEGORI"] ?></li>
        </ol>
    </nav>
    <hr>
</section>

<div class="container py-4" id="selectFish">
    <h1 class="text-center"><?= $category["NAMA_KATEGORI"] ?></h1>
    <p class="text-center">Jenis-Jenis <?= $category["NAMA_KATEGORI"] ?></p>
    <input type="search" onkeyup="searchFish()" id="searchFishTitle" class="form-control mr-sm-2 w-25" placeholder="Search">
    <div class="row mt-5">
        <?php while($fish = mysqli_fetch_assoc($resultFish)) : ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card mb-3">
                <img src="assets/img/<?= $fish["GAMBAR"] ?>" alt="<?= $fish["NAMA_IKAN"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $fish["NAMA_IKAN"]; ?></h5>
                    <p class="card-text"><?= substr($fish["DESKRIPSI"], 0, 70). "..."; ?></p>
                    <a href="fishDetail.php<?= "?id={$fish["ID_IKAN"]}" ?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php require "components/footer.php"; ?>
<script src="assets/js/search.js"></script>