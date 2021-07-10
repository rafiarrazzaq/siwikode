<section id="team" class="team" style="margin-top: 40px;">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Wisata Kuliner</h2>
            <p>Daftar wisata kuliner kota depok.</p>
        </div>

        <div class="row">

            <?php $i = 0; ?>
            <?php foreach ($wisata as $wisata) { ?>
                <?php $i++ ?>

                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in">
                        <div class="pic">
                            <img src="<?= base_url("upload/") . $wisata->foto ?>" class="img-fluid" alt="" style="width: 400px; height: 250px;">
                        </div>
                        <div class="member-info">
                            <h4><?= character_limiter($wisata->nama, 20) ?></h4>
                            <span><?= character_limiter($wisata->deskripsi, 30) ?></span>
                            <div class="social">
                                <a href="<?= base_url("home/detailWisata/") . $wisata->id ?>">Detail<i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($i == 3) {
                    break;
                } ?>

            <?php } ?>

        </div>

    </div>
</section>