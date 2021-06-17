<?php
    $db = mysqli_connect('localhost', 'root', '', 'fishtech');
    if(!$db){
        die ('koneksi dengan database gagal '. mysqli_connect_error());
    }

    $query = "SELECT ID_IKAN, NAMA_IKAN, GAMBAR, DESKRIPSI FROM ikan";
    $hasil_query = mysqli_query($db, $query);
?>

<?php require 'components/navbar.php' ?>
<section id="ikanHias" class="py-5 d-none d-md-block">
    <div class="overlay-ikan">
        <div class="container">
            <div class="row">
                <div class="col text-white">
                    <h1 class="display-3">Ikan Hias</h1>
                    <p class="lead">Kumpulan Ikan Hias</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container pt-5 pt-md-0">
    <nav>
        <ol class="breadcrumb bg-white ml-0 mt-4">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item active">Ikan Hias</li>
        </ol>
    </nav>
    <hr>
</section>

<section>
    <div class="container py-4">
        <h1 class="text-center">Ikan Hias</h1>
        <p class="text-center">Jenis-Jenis Ikan Hias</p>
        <div class="row mt-5">
            <?php while($data = mysqli_fetch_assoc($hasil_query)) : ?>
                <?php $idIkan = "?id={$data["ID_IKAN"]}" ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card mb-3">
                            <img src="aset/<?= $data["GAMBAR"] ?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data["NAMA_IKAN"]; ?></h5>
                                <p class="card-text"><?= substr($data["DESKRIPSI"], 0, 70). "..."; ?></p>
                                <a href="hias.php<?= $idIkan ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php require 'components/footer.php' ?>