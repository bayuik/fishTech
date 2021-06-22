<?php
    include "connection.php";

    $select = mysqli_query($db, $queryAdmin);

    if(isset($_GET['del'])){
        deleteFish($_GET['del']);
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data ikan</h1>
        <table class="table">
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
                    <td><a href="updateFish.php<?= "?id={$fish["ID_IKAN"]}" ?>" class="btn btn-success">Edit</a></td>
                    <td><a href="admin.php<?= "?del={$fish["ID_IKAN"]}" ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
            <?php $counter++ ?>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>