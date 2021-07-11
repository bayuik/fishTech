<?php
    include "../components/connection.php";


    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    $select = mysqli_query($db, $queryAdmin);

    if(isset($_GET['id'])){
        $filename = "../assets/img/". $_GET["filename"];
        $idFish = $_GET['id'];
        deleteFish($idFish, $filename);
        header("Location: admin.php");
    }

    $pesan_error;

    if(isset($_GET["m"])){
        $pesan_error = $_GET["m"];
    }
?>

<?php require "../components/navbarAdmin.php"; ?>

<body>
    <div class="container my-5">
        <?php
            if(!empty($pesan_error)){
                if($_GET["e"] == 1){
                    echo "<div class='alert alert-danger'>$pesan_error</div>";
                } else {
                    echo "<div class='alert alert-primary'> $pesan_error</div>";
                }
            }
        ?>
        <h1>Data ikan</h1>
        <a href="insertFish.php" class="btn btn-secondary my-4">Add Fish</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <input type="search" onkeyup="searchData()" id="searchData" class="form-control mr-sm-2 w-25 float-right mt-4" placeholder="Search">
        <table class="table mx-5 table-hover table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ikan</th>
                    <th>Kategori</th>
                    <th>File Gambar</th>
                    <th>Deskripsi</th>
                    <th>Reproduksi Ikan</th>
                    <th>Perawatan</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php $counter = 1; ?>
            <?php while($fish = mysqli_fetch_assoc($select)): ?>
            <tbody>
                <tr class="dataIkan">
                    <th><?= $counter; ?></th>
                    <td class="namaIkan"><?= $fish["NAMA_IKAN"] ?></td>
                    <td><?= $Fish[$fish["ID_KATEGORI"]-1]; ?></td>
                    <td><?= $fish["GAMBAR"] ?></td>
                    <td><?= substr($fish["DESKRIPSI"], 0, 15). "..." ?></td>
                    <td><?= substr($fish["REPRODUKSI_IKAN"], 0, 15). "..." ?></td>
                    <td><?= substr($fish["PERAWATAN"], 0, 15). "..." ?></td>
                    <td><a href="updateFish.php<?= "?id={$fish["ID_IKAN"]}" ?>" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    <td><a href="admin.php<?= "?id={$fish["ID_IKAN"]}&filename={$fish["GAMBAR"]}" ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            </tbody>
            <?php $counter++ ?>
            <?php endwhile; ?>
        </table>
    </div>
    <script src="../assets/js/search.js"></script>

</body>

</html>