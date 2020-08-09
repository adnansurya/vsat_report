<?php 
session_start();  
include('partials/global.php') ?>
<?php include('access/session.php');

if(!($role_session == 'admin' || $role_session == 'teknisi')){                
    header("location:index.php");                
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            
            include('partials/head.php'); 
            

        ?>
        
        <title><?php echo $webname; ?> - Proses</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Proses Gangguan</h1>                                                
                        <div class="mt-4 list-group">
                            <?php 
                            if($role_session === 'admin'){
                                $load = mysqli_query($conn, "SELECT tek.nama as 'nama_tek', cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* FROM user cust, user admin, user tek, report WHERE report.customer_id = cust.user_id AND (report.admin_id = admin.user_id OR report.admin_id = 0)  AND (report.teknisi_id = tek.user_id OR report.teknisi_id = 0) AND (report.stat = 'Belum Diproses' OR report.stat = 'Sedang Diproses') GROUP BY report_id ORDER BY report_id DESC ");   
                            }elseif($role_session === 'teknisi'){
                                $load = mysqli_query($conn, "SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* FROM user cust, user admin, report WHERE report.customer_id = cust.user_id AND (report.admin_id = admin.user_id OR report.admin_id = 0)   AND report.teknisi_id = ".$id_session." AND  report.stat = 'Sedang Diproses' ORDER BY report_id DESC");  
                            }
                            
                            while ($row = mysqli_fetch_array($load)){
                                echo '<a href="detail.php?id='.$row['report_id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">'.$row['nama_cust'].'</h5>
                                                <small>'.$row['waktu_lapor'].'</small>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>'.$row['lokasi'].'</p>
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <small>'.$row['keterangan'].'</small>
                                        </div>
                                        <div class="col-md-4 text-right ">';
                                
                                            if($row['stat'] == 'Belum Diproses'){
                                                echo  '<span class="badge badge-danger">'.$row['stat'].'</span>'; 
                                            }elseif($row['stat'] == 'Sedang Diproses'){
                                                echo  '<span class="badge badge-warning">'.$row['nama_admin'].'</span>';
                                                if($row['teknisi_id']!= 0){
                                                    echo '<span class="badge badge-success ml-1">'.$row['nama_tek'].'</spann>';
                                                } 
                                            }elseif($row['stat'] == 'Selesai'){
                                                echo  '<span class="badge badge-success">'.$row['nama_admin'].'</span>'; 
                                            }else{
                                                echo  '<span class="badge badge-light">'.$row['stat'].'</span>';
                                            } 

                                echo    '</div>
                                    </div>
                                    
                                </a>';
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
