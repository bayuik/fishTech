<?php
    include "../components/connection.php";

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
        <table class="table mx-5">
            <?php $counter = 1; ?>
            <?php while($fish = mysqli_fetch_assoc($select)): ?>
            <tbody>
                <tr>
                    <th><?= $counter; ?></th>
                    <td><?= $fish["NAMA_IKAN"] ?></td>
                    <td><?= $fish["GAMBAR"] ?></td>
                    <td><?= substr($fish["DESKRIPSI"], 0, 15). "..." ?></td>
                    <td><?= substr($fish["REPRODUKSI_IKAN"], 0, 15). "..." ?></td>
                    <td><?= substr($fish["PERAWATAN"], 0, 15). "..." ?></td>
                    <td><a href="updateFish.php<?= "?id={$fish["ID_IKAN"]}&filename={$fish["GAMBAR"]}" ?>"
                            class="btn btn-success">Edit</a></td>
                    <td><a href="admin.php<?= "?id={$fish["ID_IKAN"]}&filename={$fish["GAMBAR"]}" ?>"
                            class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
            <?php $counter++ ?>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>