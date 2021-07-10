<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.html"><span>Siwikode</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li <?= $this->uri->segment(2) == "adminWisataRekreasi" ? "class='active'" : "" ?>><a href="<?= base_url("home/adminWisataRekreasi") ?>">Wisata Rekreasi</a></li>
                <li <?= $this->uri->segment(2) == "adminWisataKuliner" ? "class='active'" : "" ?>><a href="<?= base_url("home/adminWisataKuliner") ?>">Wisata Kuliner</a></li>
                <li><a href="<?= base_url("home/logout") ?>">Logout</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->