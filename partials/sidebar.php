
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Customer</div>
                <a class="nav-link" href="lapor.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Lapor Gangguan
                </a>
                <a class="nav-link" href="histori.php">
                    <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                    Histori
                </a>
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="proses.php">
                    <div class="sb-nav-link-icon"><i class="far fa-clock"></i></div>
                    Proses Gangguan
                </a>
                <a class="nav-link" href="laporan.php">
                    <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                    Daftar Laporan
                </a>
                <div class="sb-sidenav-menu-heading">Teknisi</div>
                <a class="nav-link" href="proses.php">
                    <div class="sb-nav-link-icon"><i class="far fa-file"></i></div>
                    Laporan Masuk
                </a>
                <a class="nav-link" href="laporan.php">
                    <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                    Daftar Laporan
                </a>                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in sebagai:</div>
            <?php echo strtoupper($role_session); ?>
        </div>
    </nav>
</div>