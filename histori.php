<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/global.php') ?>
        <?php include('partials/head.php'); ?>
        
        <title><?php echo $webname; ?> - Blank</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Histori</h1>                        
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="list-group">
                                <a href="#collapseExample" data-toggle="collapse" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Sedang Diproses</h5>
                                        <small>2020-07-30 23:32:33</small>
                                    </div>
                                    <p class="mb-1">Jl. Toddopuli 5 setapak 1 No. 5</p>
                                    <small>Data tidak dapat terkirim</small>
                                </a>
                                <div class="collapse ml-3 mr-3" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">Admin</p>
                                            <small>Mas Agus - 08123456789</small>
                                        </div>
                                        <small>Jenis Gangguan : Pointing bergeser </small>
                                        <small>Perangkat : SAT182038</small>                                                                                                                       
                                    </div>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Belum Diproses</h5>
                                    <small>2020-07-30 23:32:33</small>
                                    </div>
                                    <p class="mb-1">Jl. Toddopuli 5 setapak 1 No. 5</p>
                                    <small>Data tidak dapat terkirim</small>
                                </a>
                                <a href="#collapseExample2" data-toggle="collapse" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Selesai</h5>
                                    <small>2020-07-30 23:32:33</small>
                                    </div>
                                    <p class="mb-1">Jl. Toddopuli 5 setapak 1 No. 5</p>
                                    <small>Data tidak dapat terkirim</small>
                                </a>
                                <div class="collapse ml-3 mr-3" id="collapseExample2">
                                    <div class="card card-body">
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">Admin</p>
                                            <small>Mas Agus - 08123456789</small>
                                        </div>
                                        <small>Jenis Gangguan : Pointing bergeser </small>
                                        <small>Perangkat : SAT182038</small>  
                                        <hr>
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">Teknisi</p>
                                            <small>Mas Pras - 08987654321</small>
                                        </div>
                                        <small>Tindakan Perbaikan : Rapatkan ulang baut dan sekrup mounting </small>                                        
                                        <img src="report_img/contoh.png" class="rounded mx-auto d-block mt-3" alt="..." height="200px">                                                                                                                      
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
    </body>
</html>
