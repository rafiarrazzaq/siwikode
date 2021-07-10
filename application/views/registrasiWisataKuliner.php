<section id="contact" class="contact section-bg" style="margin-top: 40px;">
  <div class="container">

    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Berhasil! </strong><?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php endif; ?>

    <div class="section-title" data-aos="fade-up">
      <h2>Registrasi Wisata Kuliner</h2>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <form action="<?= base_url("home/createWisataKuliner") ?>" method="post" enctype="multipart/form-data" class="forminput">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nama Tempat Wisata</label>
              <input type="text" name="nama" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Jenis Wisata</label>
              <select name="jenisWisata" class="form-control" style="border-radius: 0px; height: 44px;" required>
                <option value="">Pilih</option>
                <?php foreach ($jenisWisata as $row) { ?>
                  <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Kontak Person</label>
              <input type="text" name="kontakPerson" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">No HP / Telpon</label>
              <input type="text" name="telpon" class="form-control" placeholder="Silahkan isi..." required>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Foto</label>
            <input type="file" name="foto" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="name">Gallery</label>
            <input type="file" name="gallery[]" class="form-control" multiple>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Alamat Web</label>
              <input type="text" name="alamatWeb" class="form-control" placeholder="Silahkan isi..." required>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Deskripsi Wisata</label>
            <textarea class="form-control" name="deskripsiWisata" rows="3" placeholder="Silahkan isi..." required></textarea>
          </div>

          <div class="form-group">
            <label for="name">Deskripsi Fasilitas</label>
            <textarea class="form-control" name="deskripsiFasilitas" rows="3" placeholder="Silahkan isi..." required></textarea>
          </div>

          <div class="form-group">
            <label for="name">Alamat Lengkap</label>
            <textarea class="form-control" name="alamatLengkap" rows="3" placeholder="Silahkan isi..." required></textarea>
          </div>

          <div class="form-group">
            <label for="name">Latitude, Longitude</label>
            <input type="text" name="latlong" class="form-control" placeholder="Silahkan isi format (latitude, longitude)..." required>
          </div>

          <div class="form-group">
            <label for="name">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" placeholder="Silahkan isi..." required>
          </div>

          <h4>Testimoni 1</h4><br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nama Lengkap</label>
              <input type="text" name="namatesti1" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Email</label>
              <input type="email" name="emailtesti1" class="form-control" placeholder="Silahkan isi..." required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Rating</label>
              <input type="number" name="ratingtesti1" class="form-control" min="1" max="5" placeholder="Silahkan isi..." required>
            </div>

            <div class="form-group col-md-6">
              <label for="name">Profesi</label>
              <select name="profesi1" class="form-control" style="border-radius: 0px; height: 44px;" required>
                <option value="">Pilih</option>
                <?php foreach ($profesi as $row) { ?>
                  <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Komentar</label>
            <textarea class="form-control" name="komentartesti1" rows="2" placeholder="Silahkan isi..." required></textarea>
          </div>

          <h4>Testimoni 2</h4><br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nama Lengkap</label>
              <input type="text" name="namatesti2" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Email</label>
              <input type="email" name="emailtesti2" class="form-control" placeholder="Silahkan isi..." required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Rating</label>
              <input type="number" name="ratingtesti2" class="form-control" min="1" max="5" placeholder="Silahkan isi..." required>
            </div>

            <div class="form-group col-md-6">
              <label for="name">Profesi</label>
              <select name="profesi2" class="form-control" style="border-radius: 0px; height: 44px;" required>
                <option value="">Pilih</option>
                <?php foreach ($profesi as $row) { ?>
                  <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Komentar</label>
            <textarea class="form-control" name="komentartesti2" rows="2" placeholder="Silahkan isi..." required></textarea>
          </div>

          <h4>Testimoni 3</h4><br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nama Lengkap</label>
              <input type="text" name="namatesti3" class="form-control" placeholder="Silahkan isi..." required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Email</label>
              <input type="email" name="emailtesti3" class="form-control" placeholder="Silahkan isi..." required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Rating</label>
              <input type="number" name="ratingtesti3" class="form-control" min="1" max="5" placeholder="Silahkan isi..." required>
            </div>

            <div class="form-group col-md-6">
              <label for="name">Profesi</label>
              <select name="profesi3" class="form-control" style="border-radius: 0px; height: 44px;" required>
                <option value="">Pilih</option>
                <?php foreach ($profesi as $row) { ?>
                  <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Komentar</label>
            <textarea class="form-control" name="komentartesti3" rows="2" placeholder="Silahkan isi..." required></textarea>
          </div>

          <div>
            <button type="submit">Daftar</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>