<?php require 'components/navbar.php' ?>
<?php
    if(isset($_POST["submit"])){
        $nama = $_POST["txtName"];
        $email = $_POST["txtEmail"];
        $phone = $_POST["txtPhone"];
        $textSaran = $_POST["txtMsg"];

        $teks = "Nama saya: ".$nama . "%0AEmail: ".$email . "%0ANo Telp: " .$phone . "%0A" . $textSaran;
        $wa = str_replace(" ", "%20", $teks);
        header("Location: https://api.whatsapp.com/send?phone=6285732549276&text=$wa");
    }
?>

<section id="about">
    <div class="container pt-5 mb-5">
        <h1 class="text-center mb-5">About Us</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/about.jpg" alt="" class="img-fluid mb-3 rounded shadow">
            </div>
            <div class="col-md-6">
                <p class="lead">FishTech adalah website penyedia informasi tentang berbagai jenis ikan seperti ikan
                    hias, ikan predator, ikan laut. </p>
                <p>
                    Lihat beragam informasi tentang ikan dalam satu website kami. Atau, jika Anda tidak menemukan
                    informasi ikan di website kami, beritahu kami detail apa yang anda inginkan serta kami akan
                    mencoba mencarikan seperti yang Anda minta.</p>
                <p>kami menyediakan informasi tentang cara perawatan ikan, agar pecinta ikan tidak salah langkah
                    ketika merawat ikan. kami juga memberikan informasi tentang bagaimana cara membudidayakan ikan
                    yang dimulai dari pemilihan indukan yang bagus hingga cara pemeliharaan anak ikan</p>
                <p>Kami akan terus menambahkan jumlah jenis layanan informasi tentang ikan kami. Customer senang
                    menggunakan layanan FishTech karena mereka dapat membudidayakan berbagai jenis ikan dengan
                    benar.</p>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <h3 class="pt-5 text-center mb-5">Drop Us a Message</h3>
        <form action="about.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *"
                            value="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *"
                            style="width: 100%; height: 150px;"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success mb-5 col-12 col-md-4 float-right" value="Send Your Message">
                </div>
            </div>
        </form>
    </div>
</section>

<?php require 'components/footer.php' ?>