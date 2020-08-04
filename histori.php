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
        
        <title><?php echo $webname; ?> - Histori</title>        
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
                        
                                $load = mysqli_query($conn, "SELECT cust.nama AS 'nama_cust', admin.nama AS 'nama_admin', admin.hp AS 'hp_admin', report.* FROM user cust, user admin, report WHERE cust.user_id = report.customer_id AND admin.user_id = report.admin_id AND report.customer_id = ".$row['user_id']." ORDER BY report_id DESC");   
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
                                                        <small><b>'.$row['nama_admin'].' - '.$row['hp_admin'].'</b></small>
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
                              
                            </div>                                                  
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
    </body>
</html>
