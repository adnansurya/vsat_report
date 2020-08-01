<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include('partials/global.php');
            include('partials/head.php'); 
            include('access/session.php');

            if($role_session != 'customer'){
                header("location: index.php");
            }
        ?>
        
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
                     
                            <div class="mt-4 list-group">
                            <?php
                        
                                $load = mysqli_query($conn, "SELECT user.* , report.* FROM report INNER JOIN user ON report.customer_id = user.user_id WHERE user.user_id = ".$row['user_id']." ORDER BY report_id DESC");   
                                while ($row = mysqli_fetch_array($load)){
                                    if($row['stat'] === 'Belum Diproses'){
                                        echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
                                    }else{
                                        echo '<a href="#collapse'.$row['report_id'].'" data-toggle="collapse" class="list-group-item list-group-item-action flex-column align-items-start">';
                                    }

                                    echo '<div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">'.$row['stat'].'</h5>
                                            <small>'.$row['waktu_lapor'].'</small>
                                            </div>
                                            <p class="mb-1">'.$row['lokasi'].'</p>
                                            <small>'.$row['keterangan'].'</small>
                                        </a>';

                                    if($row['stat'] === 'Sedang Diproses'){
                                        echo '<div class="collapse ml-3 mr-3" id="collapse'.$row['report_id'].'">
                                                <div class="card card-body">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Admin</p>
                                                        <small><b>Mas Agus - 08123456789</b></small>
                                                    </div>
                                                    <small>Jenis Gangguan : Pointing bergeser </small>
                                                    <small>Perangkat : SAT182038</small>                                                                                                                       
                                                </div>
                                            </div>';                                        
                                    }elseif($row['stat'] === 'Selesai'){
                                        echo '<div class="collapse ml-3 mr-3" id="collapse'.$row['report_id'].'">
                                                <div class="card card-body">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Admin</p>
                                                        <small><b>Mas Agus - 08123456789</b></small>
                                                    </div>
                                                    <small>Jenis Gangguan : Pointing bergeser </small>
                                                    <small>Perangkat : SAT182038</small>  
                                                    <hr>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Teknisi</p>
                                                        <small><b>Mas Pras - 08987654321</b></small>
                                                    </div>
                                                    <small>Tindakan Perbaikan : Rapatkan ulang baut dan sekrup mounting </small>                                        
                                                    <img src="report_img/contoh.png" class="rounded mx-auto d-block mt-3" alt="..." height="200px" style="max-width: 100%;  height: auto;">                                                                                                                      
                                                </div>
                                            </div>';
                                    }                                
                                }
                            ?>
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
                                            <small><b>Mas Agus - 08123456789</b></small>
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
                                            <small><b>Mas Agus - 08123456789</b></small>
                                        </div>
                                        <small>Jenis Gangguan : Pointing bergeser </small>
                                        <small>Perangkat : SAT182038</small>  
                                        <hr>
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">Teknisi</p>
                                            <small><b>Mas Pras - 08987654321</b></small>
                                        </div>
                                        <small>Tindakan Perbaikan : Rapatkan ulang baut dan sekrup mounting </small>                                        
                                        <img src="report_img/contoh.png" class="rounded mx-auto d-block mt-3" alt="..." height="200px" style="max-width: 100%;  height: auto;">                                                                                                                      
                                    </div>
                                </div>
                            </div>                                                  
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
    </body>
</html>
