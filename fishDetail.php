<?php include "components/navbar.php" ?>

<?php 
    include "connection.php";

        $idIkan = $_GET["id"];

        $query = "SELECT * FROM ikan WHERE ID_IKAN = $idIkan";
        $hasil_query = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($hasil_query);

        $fishName = $data["NAMA_IKAN"];
        $idCategory = $data["ID_KATEGORI"];
        $gambarIkan = $data["GAMBAR"];
        $deskripsi = $data["DESKRIPSI"];
        $reproduksi = $data["REPRODUKSI_IKAN"];
        $perawatan = $data["PERAWATAN"];

        $queryCategory = "SELECT * FROM kategori WHERE ID_KATEGORI = $idCategory";
        $category = mysqli_fetch_assoc(mysqli_query($db,$queryCategory));
?>

<section class="container pt-5">
    <nav>
        <ol class="breadcrumb bg-white ml-0 mt-4">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="selectFish.php?idCategory=<?= $idCategory ?>"><?= $category["NAMA_KATEGORI"] ?></a></li>
            <li class="breadcrumb-item active"><?= $fishName ?></li>
        </ol>
    </nav>
    <hr>
</section>

<article class="container py-2">
    <h1><?= $fishName ?></h1>
    <img src="assets/img/<?= $gambarIkan ?>" class="py-4 mx-auto d-block rounded img-thumbnail" alt="">
    <p class="my-5"><?= $deskripsi ?></p>
    <h2>Ekologi dan Reproduksi</h2>
    <p class="mb-5 mt-3"><?= $reproduksi ?></p>
    <h2>Perawatan</h2>
    <p class="mb-5 mt-3"><?= $perawatan ?></p>
</article>

<?php include "components/footer.php" ?>