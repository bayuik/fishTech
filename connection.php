<?php
    $db = mysqli_connect('localhost', 'root', '', 'fishtech');
    if(!$db){
        die ('koneksi dengan database gagal '. mysqli_connect_error());
    }

    function updateFish($idIkan, $kategoriIkan, $namaIkan, $gambarIkan, $deskripsiIkan, $reproduksiIkan, $perawatanIkan){
        $query = "UPDATE ikan SET ID_KATEGORI = '$kategoriIkan', NAMA_IKAN = '$namaIkan', GAMBAR = '$gambarIkan', DESKRIPSI = '$deskripsiIkan', REPRODUKSI_IKAN = '$reproduksiIkan', PERAWATAN = '$perawatanIkan' WHERE ID_IKAN = $idIkan";
        global $db;

        $insertDb = mysqli_query($db, $query);
        if(!$insertDb){
            die ("Query error " . mysqli_error($db));
        }
    }

    $queryAdmin = "SELECT ID_IKAN, NAMA_IKAN, GAMBAR, DESKRIPSI, REPRODUKSI_IKAN, PERAWATAN FROM ikan";

    function deleteFish($idIkan){
        $queryDelete = "DELETE FROM ikan WHERE ID_IKAN = $idIkan";
        global $db;
        $delete = mysqli_query($db, $queryDelete);
        return $delete;
    }
?>