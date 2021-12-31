<!-- Sidebar -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(); ?>">Profile Matching</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(); ?>">G.A.P</a>
        </div>
        <!-- Sidebar-menu -->
        <ul class="sidebar-menu">
            <!-- Main Menu -->
            <li class=""><a class="nav-link" href="<?= base_url() . 'home'; ?>"> <i class="fas fa-home"></i> <span>Home</span></a></li>
            <?php if ($this->session->userdata('akses') == 'admin') { ?>
                <li class=""><a class="nav-link" href="<?= base_url() . 'user'; ?>"> <i class="fas fa-user"></i> <span>Petani</span></a></li>
                <li class=""><a class="nav-link" href="<?= base_url() . 'kriteria'; ?>"> <i class="fas fa-tag"></i> <span>Kriteria</span></a></li>
                <li class=""><a class="nav-link" href="<?= base_url() . 'bobotkriteria'; ?>"> <i class="fas fa-tags"></i> <span>Bobot Kriteria</span></a></li>
                <li class=""><a class="nav-link" href="<?= base_url() . 'nilai'; ?>"> <i class="fas fa-leaf"></i> <span>Nilai Profil Alternatif</span></a></li>
            <?php } ?>
            <?php if ($this->session->userdata('akses') == 'user') { ?>
                <li class=""><a class="nav-link" href="<?= base_url() . 'perhitungan'; ?>"> <i class="fas fa-clipboard-list"></i> <span>Perhitungan</span></a></li>
                <li class=""><a class="nav-link" href="<?= base_url() . 'riwayat'; ?>"> <i class="fas fa-history"></i> <span>Riwayat</span></a></li>
            <?php } ?>
            <!-- End Main Menu -->
        </ul>
        <!-- End Sidebar-menu -->
    </aside>
</div>
<!-- End Sidebar -->