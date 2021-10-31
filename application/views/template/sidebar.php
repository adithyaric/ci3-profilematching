<!-- Sidebar -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(); ?>">Profile Matching</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <!-- Sidebar-menu -->
        <ul class="sidebar-menu">
            <!-- Main Menu -->
            <li class="menu-header">Menu</li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'home'; ?>"> <i class="far fa-square"></i> <span>Home</span></a></li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'alternatif'; ?>"> <i class="fas fa-columns"></i> <span>Alternatif</span></a></li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'kriteria'; ?>"> <i class="fas fa-columns"></i> <span>Kriteria</span></a></li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'subkriteria'; ?>"> <i class="fas fa-columns"></i> <span>Sub Kriteria</span></a></li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'nilai'; ?>"> <i class="fas fa-columns"></i> <span>Nilai Profil Alternatif</span></a></li>
            <li class=""><a class="nav-link" href="<?= base_url() . 'perhitungan'; ?>"> <i class="fas fa-columns"></i> <span>Perhitungan</span></a></li>
            <!-- End Main Menu -->
            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
        </ul>
        <!-- End Sidebar-menu -->
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
<!-- End Sidebar -->