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

                            $load = mysqli_query($conn, "SELECT user.* , report.* FROM report INNER JOIN user ON report.customer_id = user.user_id WHERE report.stat = 'Belum Diproses' OR report.stat = 'Sedang Diproses' ORDER BY report_id DESC");   
                            while ($row = mysqli_fetch_array($load)){
                                echo '<a href="detail.php?id='.$row['report_id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">'.$row['nama'].'</h5>
                                        <small>'.$row['waktu_lapor'].'</small>
                                    </div>
                                    
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-1">'.$row['lokasi'].'</p>
                                        <button type="button" class="btn ';
                                
                                if($row['stat'] == 'Belum Diproses'){
                                    echo  'btn-danger'; 
                                }elseif($row['stat'] == 'Sedang Diproses'){
                                    echo  'btn-warning'; 
                                }elseif($row['stat'] == 'Selesai'){
                                    echo  'btn-success'; 
                                }else{
                                    echo  'btn-light'; 
                                } 

                                echo  ' btn-sm">'.$row['stat'].'</button>
                                    </div>
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
