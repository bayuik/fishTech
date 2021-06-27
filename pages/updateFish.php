<?php
    require "../components/connection.php";

    if(isset($_POST['submit'])){
        $kategoriIkan = $_POST["kategoriIkan"];
        // die($kategoriIkan);
        $namaIkan = $_POST["namaIkan"];
        $gambarIkan = $_FILES["gambarIkan"]["name"];
        $deskripsiIkan = $_POST["deskripsiIkan"];
        $reproduksiIkan = $_POST["reproduksiIkan"];
        $perawatanIkan = $_POST["perawatanIkan"];
        $filenameUpdate = $_POST["filenameUpdate"];
        $idIkan =  $_POST["idIkan"];
        $pesan_error = "";
        
        if($filenameUpdate){
            $nama_folder = "../assets/img";
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
                $pesan_error = "Data ikan berhasil di Edit";
                updateFish($idIkan, $kategoriIkan, $namaIkan, $gambarIkan, $deskripsiIkan, $reproduksiIkan, $perawatanIkan, $filenameUpdate);
                header("Location: admin.php?m={$pesan_error}&e=0");
            } else {
                $pesan_error = "Data ikan berhasil di Edit";
                updateFish($idIkan, $kategoriIkan, $namaIkan, $filenameUpdate, $deskripsiIkan, $reproduksiIkan, $perawatanIkan, $filenameUpdate);
                header("Location: admin.php?m={$pesan_error}&e=0");
            }
        }else {
            $pesan_error .= "Data ikan gagal di Edit";
            header("Location: admin.php?m={$pesan_error}&e=1");
        }
    }

    $idIkan = $_GET["id"];
    $updatePage = "SELECT * FROM ikan WHERE ID_IKAN = $idIkan";
    $showData = mysqli_fetch_assoc(mysqli_query($db, $updatePage));
?>

<?php require "../components/navbarAdmin.php"; ?>

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
    <form action="updateFish.php" method="POST" class="mt-5 pt-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategoriIkan">Kategori Ikan</label>
            <select id="kategoriIkan" class="form-control" name="kategoriIkan">
                <?php for($i = 0; $i < 3; $i++): ?>
                    <?php if($i+1 == $showData["ID_KATEGORI"]): ?>
                        <option selected='selected' value='<?= $i+1 ?>'><?= $Fish[$i] ?></option>
                    <?php else : ?>
                        <option value='<?= $i+1 ?>'><?= $Fish[$i] ?></option>"
                    <?php endif; ?>
                    
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="namaIkan">Nama ikan</label>
            <input type="text" class="form-control" name="namaIkan" id="namaIkan" value="<?= $showData["NAMA_IKAN"] ?>">
        </div>
        <div class="form-group">
            <label for="gambarIkan">Gambar Ikan</label>
            <img src="../assets/img/<?= $showData["GAMBAR"] ?>" alt="" class="img-thumbnail w-25 d-block">
            <input type="file" accept=".jpg, .png, .gif" name="gambarIkan" class="form-control-file d-none"
                id="gambarIkan">
            <label for="gambarIkan" class="btn btn-secondary">Ubah Gambar</label>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi ikan</label>
            <textarea class="form-control" name="deskripsiIkan" id="deskripsi"
                rows="3"><?= $showData["DESKRIPSI"] ?></textarea>
        </div>
        <div class="form-group">
            <label for="reproduksiIkan">Reproduksi Ikan</label>
            <textarea class="form-control" name="reproduksiIkan" id="reproduksiIkan"
                rows="3"><?= $showData["REPRODUKSI_IKAN"] ?></textarea>
        </div>
        <div class="form-group">
            <label for="perawatanIkan">Perawatan Ikan</label>
            <textarea class="form-control" name="perawatanIkan" id="perawatanIkan"
                rows="3"><?= $showData["PERAWATAN"] ?></textarea>
        </div>
        <input type="hidden" name="idIkan" value="<?= $showData["ID_IKAN"] ?>">
        <input type="hidden" name="filenameUpdate" value="<?= $showData["GAMBAR"] ?>">
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php include "../components/footer.php" ?>