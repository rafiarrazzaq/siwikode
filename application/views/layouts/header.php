<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="<?= base_url("home/index") ?>"><span>Siwikode</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li <?= $this->uri->segment(2) == "index" ? "class='active'" : "" ?>><a href="<?= base_url("home/index") ?>">Home</a></li>
                <li <?= $this->uri->segment(2) == "wisataRekreasi" ? "class='active'" : "" ?>><a href="<?= base_url("home/wisataRekreasi") ?>">Wisata Rekreasi</a></li>
                <li <?= $this->uri->segment(2) == "wisataKuliner" ? "class='active'" : "" ?>><a href="<?= base_url("home/wisataKuliner") ?>">Wisata Kuliner</a></li>
                <li class="drop-down"><a href="">Registrasi</a>
                    <ul>
                        <li><a href="<?= base_url("home/registrasiWisataRekreasi") ?>">Wisata Rekreasi</a></li>
                        <li><a href="<?= base_url("home/registrasiWisataKuliner") ?>">Wisata Kuliner</a></li>
                    </ul>
                </li>
                <li <?= $this->uri->segment(2) == "aboutus" ? "class='active'" : "" ?>><a href="<?= base_url("home/aboutus") ?>">About Us</a></li>
                <li <?= $this->uri->segment(2) == "login" ? "class='active'" : "" ?>><a href="<?= base_url("home/login") ?>">Login</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->