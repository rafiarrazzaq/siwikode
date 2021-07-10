<?php foreach ($wisata as $wisata) { ?>

<section id="portfolio" class="portfolio" style="margin-top: 40px;">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $wisata->nama ?></h2>
        </div>

        <div class="section-title" data-aos="fade-up">
            <h4>Gallery Foto</h4>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($galery as $galery) { ?>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url("upload/") . $galery->filename ?>" class="img-fluid" alt="" style="width: 400px; height: 200px;">
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</section>

<section id="contact" class="contact section-bg">
    <div class="container">

        <div class="row">

            <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                    <div class="address">
                        <h4 style="padding: 0;">Deskripsi Fasilitas:</h4><br>
                        <p style="padding: 0;"><?= $wisata->fasilitas ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Alamat & Peta Lokasi:</h4>
                        <p><?= $wisata->alamat ?></p>
                    </div>

                    <iframe src="https://maps.google.com/maps?q=<?= $wisata->latlong ?>&hl=es&z=14&amp;output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Testimoni & Komentar</h2>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="100">

        <?php foreach ($testimoni as $testimoni) { ?>

            <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= $testimoni->komentar ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3><?= $testimoni->namatesti ?></h3>
                <h4><?= $testimoni->nama ?></h4>
            </div>

        <?php } ?>

        </div>

    </div>
</section>

<?php } ?>