<?php require 'components/navbar.php' ?>

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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1"
            d="M0,128L60,112C120,96,240,64,360,53.3C480,43,600,53,720,69.3C840,85,960,107,1080,106.7C1200,107,1320,85,1380,74.7L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>
</section>

<section id="contact">
    <div class="container">
        <h3 class="pt-5 text-white text-center mb-5">Drop Us a Message</h3>
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
                <a href="" class="btn btn-danger mb-5 col-12 col-md-4 float-right">Send Your Message</a>
            </div>
        </div>
        </form>
    </div>
</section>

<?php require 'components/footer.php' ?>