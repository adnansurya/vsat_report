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
                        
                                $load = mysqli_query($conn, "SELECT tek.nama AS 'nama_tek', tek.hp AS 'hp_tek', 
                                cust.nama AS 'nama_cust', admin.nama AS 'nama_admin', admin.hp AS 'hp_admin', report.* 
                                FROM user cust, user admin, user tek, report
                                WHERE cust.user_id = report.customer_id
                                AND (admin.user_id = report.admin_id OR report.admin_id = 0) 
                                AND (tek.user_id = report.teknisi_id OR report.teknisi_id = 0) 
                                AND report.customer_id = ".$row['user_id']." GROUP BY report_id ORDER BY report_id DESC");   
                                while ($row = mysqli_fetch_array($load)){
                                    if($row['stat'] === 'Belum Diproses'){
                                        echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
                                    }else{
                                        echo '<a href="#collapse'.$row['report_id'].'" data-toggle="collapse" class="list-group-item list-group-item-action flex-column align-items-start">';
                                    }

                                    echo '<div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">'.$row['lokasi'].'</p>
                                            <small>'.$row['waktu_lapor'].'</small>
                                        </div>
                                    
                                        <div class="d-flex w-100 justify-content-between">
                                        <small>'.$row['keterangan'].'</small>';
                                    
                                    if($row['stat'] == 'Belum Diproses'){
                                        echo  '<span class="badge badge-pill badge-danger">'.$row['stat'].'</span>'; 
                                    }elseif($row['stat'] == 'Sedang Diproses'){
                                        echo  '<span class="badge badge-pill badge-warning">'.$row['stat'].'</span>'; 
                                    }elseif($row['stat'] == 'Selesai'){
                                        echo  '<span class="badge badge-pill badge-success">'.$row['stat'].'</span>'; 
                                    }else{
                                        echo  '<span class="badge badge-pill badge-light">'.$row['stat'].'</span>'; 
                                    } 


                                    echo '</div></a>';

                                    if($row['stat'] === 'Sedang Diproses'){
                                        echo '<div class="collapse ml-3 mr-3" id="collapse'.$row['report_id'].'">
                                                <div class="card card-body">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Admin</p>
                                                        <small><b>'.$row['nama_admin'].' - '.$row['hp_admin'].'</b></small>
                                                    </div>
                                                    <small>Jenis Gangguan : '.$row['jenis'].' </small>                                                                                                                                                      
                                                </div>
                                            </div>';                                        
                                    }elseif($row['stat'] === 'Selesai'){
                                        echo '<div class="collapse ml-3 mr-3" id="collapse'.$row['report_id'].'">
                                                <div class="card card-body">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Admin</p>
                                                        <small><b>'.$row['nama_admin'].' - '.$row['hp_admin'].'</b></small>
                                                    </div>
                                                    <small>Jenis Gangguan : '.$row['jenis'].' </small>                                                      
                                                    <hr>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1">Teknisi</p>
                                                        <small><b>'.$row['nama_tek'].' - '.$row['hp_tek'].'</b></small>
                                                    </div>
                                                    <small><i class="fas fa-check"></i> '.$row['waktu_selesai'].' </small>  
                                                    <small>Tindakan Perbaikan : '.$row['tindakan'].' </small>
                                                                                           
                                                    <img src="report_img/'.$row['gambar'].'" class="rounded mx-auto d-block mt-3" alt="..." height="200px" style="max-width: 100%;  height: auto;">                                                                                                                      
                                                    
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
