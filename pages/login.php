<?php
    require "../components/navbarAdmin.php";
    
    if(isset($_POST["submit"])){
        $db = mysqli_connect('localhost', 'root', '', 'fishtech');
        if(!$db){
            die ('koneksi dengan database gagal '. mysqli_connect_error());
        }
        $username = strip_tags(trim($_POST["username"]));
        $password = strip_tags(trim($_POST["password"]));
        $pesan_error="";

        $queryLogin = "SELECT * FROM `admin` WHERE username='$username' AND password='$password'";
        $login = mysqli_query($db, $queryLogin);

        if (empty($username)) {
            $pesan_error .= "Username belum diisi <br><br>";
        } else if(empty($password)) {
                $pesan_error .= "Password belum diisi <br><br>";
        } else if(mysqli_num_rows($login) == 0){
                $pesan_error .= "Username dan Password tidak sesuai";
            }

        if($pesan_error === ""){
            session_start();
            $_SESSION["username"] = $username;
            header("Location: admin.php");
        }
    } else {
        $pesan_error = "";
        $username = "";
        $password = "";
    }
?>

<body>
    <div class="container mx-auto w-25 mt-5">
        <h1 class="text-center">Login Admin</h1>
        <p>Silahkan masuk dengan Akun Anda</p>
        <?php
            if($pesan_error !== ""){
                echo "<div class='alert alert-danger text-center'>$pesan_error</div>";
            }

        ?>
        <form action="login.php" method="post">
            <div class="form-group mt-5">
                <label for="username">Username</label>
                <input type="text" value="<?= $username ?>" placeholder="Username" name="username" class="form-control"
                    id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="<?= $password ?>" placeholder="Password" name="password"
                    class="form-control" id="password">
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-danger pl-5 pr-5 d-inline-block"><a href="../index.php">Back</a></button>
                <button name="submit" class="btn btn-success pl-5 pr-5 d-inline">Login</button>
            </div>
        </form>
    </div>
</body>