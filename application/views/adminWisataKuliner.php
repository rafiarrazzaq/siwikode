<section style="margin-top: 40px; margin-bottom: 155px;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Kelola Wisata Kuliner</h2>
        </div>
        <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Wisata</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Kontak Person</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($wisata as $row) { ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->bintang ?></td>
                        <td><?= $row->kontak ?></td>
                        <td><img src="<?= base_url("upload/") . $row->foto ?>" class="img-fluid" alt="" style="width: 100px; height: 80px;"></td>
                        <td>
                            <a href="<?= base_url("home/detailWisataAdmin/") . $row->id ?>" class="btn btn-primary px-3"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url("home/editWisataKuliner/") . $row->id ?>" class="btn btn-warning px-3"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url("home/deleteWisataKuliner/") . $row->id ?>" class="btn btn-danger px-3"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</section>