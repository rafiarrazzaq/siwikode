<section id="contact" class="contact section-bg" style="margin-top: 40px;">
    <div class="container">

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil! </strong><?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="section-title" data-aos="fade-up">
            <h2>Edit Wisata Rekreasi</h2>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="<?= base_url("home/updateWisataRekreasi") ?>" method="post" enctype="multipart/form-data" class="forminput">

                    <?php foreach ($wisata as $wisata) { ?>
                        <input type="text" name="wisataId" value="<?= $wisata->id ?>" hidden>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Tempat Wisata</label>
                                <input type="text" name="nama" class="form-control" value="<?= $wisata->nama ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Jenis Wisata</label>
                                <select name="jenisWisata" class="form-control" style="border-radius: 0px; height: 44px;">
                                    <option value="">Pilih</option>
                                    <?php foreach ($jenisWisata as $row) { ?>
                                        <option value="<?= $row->id ?>" <?= $wisata->jenis_wisata_id == $row->id ? "selected" : "" ?>><?= $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Kontak Person</label>
                                <input type="text" name="kontakPerson" class="form-control" value="<?= $wisata->kontak ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">No HP / Telpon</label>
                                <input type="text" name="telpon" class="form-control" value="<?= $wisata->no_hp ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Foto</label><br>
                            <img src="<?= base_url("upload/") . $wisata->foto ?>" class="img-fluid" alt="" style="width: 200px; height: 150px;"><br><br>
                            <input type="file" name="foto" class="form-control">
                            <input type="text" name="fotoLama" value="<?= $wisata->foto ?>" hidden>
                        </div>

                        <div class="form-group">
                            <label for="name">Gallery</label><br>

                            <section id="portfolio" class="portfolio" style="padding: 0px;">
                                <div class="container">
                                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                        <?php foreach ($galery as $galery) { ?>

                                            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                                <div class="portfolio-wrap">
                                                    <img src="<?= base_url("upload/") . $galery->filename ?>" class="img-fluid" alt="" style="width: 200px; height: 150px;">
                                                    <div class="portfolio-info">
                                                        <h4>Hapus</h4>
                                                    </div>
                                                    <div class="portfolio-links">
                                                        <a href="<?= base_url("home/deleteGalery/") . $galery->id_galery .'/'. $wisata->id ?>"><i class="bx bx-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </section>
                            <input type="file" name="gallery[]" class="form-control" multiple>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Email</label>
                                <input type="text" name="email" class="form-control" value="<?= $wisata->email ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Alamat Web</label>
                                <input type="text" name="alamatWeb" class="form-control" value="<?= $wisata->web ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Deskripsi Wisata</label>
                            <textarea class="form-control" name="deskripsiWisata" rows="3"><?= $wisata->deskripsi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Deskripsi Fasilitas</label>
                            <textarea class="form-control" name="deskripsiFasilitas" rows="3"><?= $wisata->fasilitas ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamatLengkap" rows="3"><?= $wisata->alamat ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Latitude, Longitude</label>
                            <input type="text" name="latlong" class="form-control" value="<?= $wisata->latlong ?>">
                        </div>

                        <div class="form-group">
                            <label for="name">Rating</label>
                            <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= $wisata->bintang ?>">
                        </div>

                        <div>
                            <button type="submit">Edit&nbsp;<i class="fas fa-pencil-alt"></i></button>
                        </div>

                    <?php } ?>

                </form>
            </div>
        </div>

    </div>
</section>