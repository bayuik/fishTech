<?php
    include "connection.php";

    $idIkan = $_GET["id"];



    if(isset($_POST['submit'])){
        $error = $_FILES['gambarIkan']['error'];
        global $idIkan;

        $kategoriIkan = $_POST["kategoriIkan"];
        $namaIkan = $_POST["namaIkan"];
        $gambarIkan = $_FILES["gambarIkan"]["name"];
        $deskripsiIkan = $_POST["deskripsiIkan"];
        $reproduksiIkan = $_POST["reproduksiIkan"];
        $perawatanIkan = $_POST["perawatanIkan"];

        if($error === 0){
            $pesan_error = "";

            $nama_folder = "assets/img";
            $tmp = $_FILES["gambarIkan"]["tmp_name"];
            $path_file = "$nama_folder/$gambarIkan";
            $upload_gagal = false;

            if(file_exists($path_file)) {
                $pesan_error = "File dengan nama sama sudah ada di server <br>";
                $upload_gagal = true;
            }

            $ukuran_file = $_FILES["gambarIkan"]["size"];
            if($ukuran_file > 20000000) {
                $pesan_error = "Ukuran file melebihi 20mb <br>";
                $upload_gagal = true;
            }

            if(!$upload_gagal){
                move_uploaded_file($tmp, $path_file);
                $pesan_error = "File sukses di upload";
            } else {
                $pesan_error .= "File gagal di upload";
            }
        }

        updateFish($idIkan, $kategoriIkan, $namaIkan, $gambarIkan, $deskripsiIkan, $reproduksiIkan, $perawatanIkan);
    }
?>

<?php include "components/navbar.php" ?>

<div class="w-50 mx-auto my-5 pt-5">
    <?php
            if(!empty($pesan_error)){
                if($upload_gagal){
                    echo "<div class='alert alert-danger'>$pesan_error</div>";
                } else {
                    echo "<div class='alert alert-primary'> $pesan_error</div>";
                }
            }
    ?>
    <form action="updateFish.php?id=<?= $idIkan ?>" method="post" class="mt-5 pt-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategoriIkan">Kategori Ikan</label>
            <select id="kategoriIkan" class="form-control" name="kategoriIkan">
                <option value="1">Ikan Hias</option>
                <option value="2">Ikan Laut</option>
                <option value="3">Ikan Predator</option>
            </select>
        </div>
        <div class="form-group">
            <label for="namaIkan">Nama ikan</label>
            <input type="text" class="form-control" name="namaIkan" id="namaIkan">
        </div>
        <div class="form-group">
            <label for="gambarIkan">Gambar Ikan</label>
            <input type="file" accept=".jpg, .png, .gif" name="gambarIkan" class="form-control-file" id="gambarIkan">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi ikan</label>
            <textarea class="form-control" name="deskripsiIkan" id="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="reproduksiIkan">Reproduksi Ikan</label>
            <textarea class="form-control" name="reproduksiIkan" id="reproduksiIkan" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="perawatanIkan">Perawatan Ikan</label>
            <textarea class="form-control" name="perawatanIkan" id="perawatanIkan" rows="3"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php include "components/footer.php" ?>