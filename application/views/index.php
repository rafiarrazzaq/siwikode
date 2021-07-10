<section id="hero">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                <div>
                    <h1>Selamat Datang di Siwikode</h1>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                <img src="<?= base_url("public/assets/img/logo.svg") ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>


<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Wisata Rekreasi & Kuliner Unggulan Kota Depok</h2>
        </div>

        <div class="row">

            <?php $i = 0; ?>
            <?php foreach ($wisata as $data) { ?>
                <?php $i++ ?>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <img src="<?= base_url("upload/") . $data->foto ?>" alt="" width="190" height="100"><br><br>
                        <h4 class="title"><?= character_limiter($data->nama, 12) ?></h4>
                        <p class="description"><?= character_limiter($data->deskripsi, 40) ?></p><br>
                        <a href="<?= base_url("home/detailWisata/") . $data->id ?>">Detail<i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>

                <?php if ($i == 4) {
                    break;
                } ?>

            <?php } ?>

        </div>

    </div>
</section>