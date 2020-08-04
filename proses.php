<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include('partials/global.php'); 
            include('partials/head.php'); 
            include('access/session.php');

            if(!($role_session == 'admin' || $role_session == 'teknisi')){                
                header("location:index.php");                
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
                        <h1 class="mt-4">Proses Gangguan</h1>                                                
                        <div class="mt-4 list-group">
                            <?php 
                            if($role_session === 'admin'){
                                $load = mysqli_query($conn, "SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* FROM user cust, user admin, report WHERE report.customer_id = cust.user_id AND (report.admin_id = admin.user_id OR report.admin_id = 0) AND (report.stat = 'Belum Diproses' OR report.stat = 'Sedang Diproses') GROUP BY report_id ORDER BY report_id DESC ");   
                            }elseif($role_session === 'teknisi'){
                                $load = mysqli_query($conn, "SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* FROM user cust, user admin, report WHERE report.customer_id = cust.user_id AND (report.admin_id = admin.user_id OR report.admin_id = 0)   AND report.teknisi_id = ".$id_session." AND  report.stat = 'Sedang Diproses' ORDER BY report_id DESC");  
                            }
                            
                            while ($row = mysqli_fetch_array($load)){
                                echo '<a href="detail.php?id='.$row['report_id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">'.$row['nama_cust'].'</h5>
                                        <small>'.$row['waktu_lapor'].'</small>
                                    </div>
                                    
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-1">'.$row['lokasi'].'</p>';
                                
                                if($row['stat'] == 'Belum Diproses'){
                                    echo  '<button type="button" class="btn btn-danger btn-sm">'.$row['stat'].'</button>'; 
                                }elseif($row['stat'] == 'Sedang Diproses'){
                                    echo  '<button type="button" class="btn btn-warning btn-sm">'.$row['nama_admin'].'</button>'; 
                                }elseif($row['stat'] == 'Selesai'){
                                    echo  '<button type="button" class="btn btn-success btn-sm">'.$row['nama_admin'].'</button>'; 
                                }else{
                                    echo  '<button type="button" class="btn btn-light'; 
                                } 

                                echo  '</div>
                                    <small>'.$row['keterangan'].'</small>
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
