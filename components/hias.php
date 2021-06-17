<?php include "components/navbar.php" ?>

<?php 
        $db = mysqli_connect('localhost', 'root', '', 'fishtech');
        if(!$db){
            die ('koneksi dengan database gagal '. mysqli_connect_error());
        }

        $idIkan = $_GET["id"];

        $query = "SELECT * FROM ikan WHERE ID_IKAN = $idIkan";
        $hasil_query = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($hasil_query);

        $namaIkan = $data["NAMA_IKAN"];
        $gambarIkan = $data["GAMBAR"];
        $deskripsi = $data["DESKRIPSI"];
        $reproduksi = $data["REPRODUKSI_IKAN"];
        $perawatan = $data["PERAWATAN"];
?>

<section class="container pt-5">
    <nav>
        <ol class="breadcrumb bg-white ml-0 mt-4">
            <li class="breadcrumb-item"><a href="../../index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="../ikanHias.html">Ikan Hias</a></li>
            <li class="breadcrumb-item active"><?= $namaIkan ?></li>
        </ol>
    </nav>
    <hr>
</section>

<article class="container py-2">
    <h1><?= $namaIkan ?></h1>
    <img src="aset/<?= $gambarIkan ?>" class="py-4 mx-auto d-block rounded img-thumbnail" alt="">
    <p class="my-5"><?= $deskripsi ?></p>
    <h2>Ekologi dan Reproduksi</h2>
    <p class="mb-5 mt-3"><?= $reproduksi ?></p>
    <h2>Perawatan</h2>
    <p class="mb-5 mt-3"><?= $perawatan ?></p>
</article>

<?php include "components/footer.php" ?>