<?php
    $db = mysqli_connect('localhost', 'root', '', 'fishtech');
    if(!$db){
        die ('koneksi dengan database gagal '. mysqli_connect_error());
    }
    
    $queryAdmin = "SELECT ID_IKAN, NAMA_IKAN, GAMBAR, DESKRIPSI, REPRODUKSI_IKAN, PERAWATAN FROM ikan";
    $Fish = ["Ikan Hias", "Ikan Laut", "Ikan Predator"];


    function insertFish($kategoriIkan, $namaIkan, $gambarIkan, $deskripsiIkan, $reproduksiIkan, $perawatanIkan){
        $queryInsert = "INSERT INTO ikan (ID_KATEGORI, NAMA_IKAN, GAMBAR, DESKRIPSI, REPRODUKSI_IKAN, PERAWATAN) VALUES ('$kategoriIkan', '$namaIkan', '$gambarIkan', '$deskripsiIkan', '$reproduksiIkan', '$perawatanIkan')";
        global $db;
        $insertDb = mysqli_query($db, $queryInsert);
        if(!$insertDb){
            die ("Query error " . mysqli_error($db));
        }
    }

    function resultFish($idCategory){
        global $db;
        $queryFish = "SELECT ID_IKAN, NAMA_IKAN, GAMBAR, DESKRIPSI FROM ikan WHERE ID_KATEGORI = $idCategory";
        $resultFish = mysqli_query($db, $queryFish);
        return $resultFish;
    }

    function category($idCategory){
        global $db;
        $queryCategory = "SELECT * FROM kategori WHERE ID_KATEGORI = $idCategory";
        $category = mysqli_fetch_assoc(mysqli_query($db,$queryCategory));
        return $category;
    }

    function updateFish($idIkan, $kategoriIkan, $namaIkan, $gambarIkan, $deskripsiIkan, $reproduksiIkan, $perawatanIkan, $filenameUpdate){
        $queryUpdate = "UPDATE ikan SET ID_KATEGORI = '$kategoriIkan', NAMA_IKAN = '$namaIkan', GAMBAR = '$gambarIkan', DESKRIPSI = '$deskripsiIkan', REPRODUKSI_IKAN = '$reproduksiIkan', PERAWATAN = '$perawatanIkan' WHERE ID_IKAN = $idIkan";
        global $db;

        if($gambarIkan != $filenameUpdate){
            unlink("../assets/img/". $filenameUpdate);
        }

        $insertDb = mysqli_query($db, $queryUpdate);
        if(!$insertDb){
            die ("Query error " . mysqli_error($db));
        }
    }

    function deleteFish($idIkan, $filename){
        $queryDelete = "DELETE FROM ikan WHERE ID_IKAN = $idIkan";
        global $db;
        unlink($filename);
        $delete = mysqli_query($db, $queryDelete);
        return $delete;
    }
?>