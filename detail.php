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
            
            if(!isset($_GET['id'])){
                header("location:index.php");   
            }else{
                $report_sql = mysqli_query($conn,"SELECT user.* , report.* FROM report INNER JOIN user ON report.customer_id = user.user_id where report.report_id = '".$_GET['id']."'");
      
                $report = mysqli_fetch_array($report_sql,MYSQLI_ASSOC);
            }
        ?>
        
        <title><?php echo $webname; ?> - Detail Laporan</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Detail Laporan</h1>                        
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <small>Nama Pelanggan</small>
                                    <small>ID Laporan</small>                                                                                                         
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <p><?php echo $report['nama']; ?></p>
                                    <p>#<?php echo $report['report_id']; ?></p>                                    
                                </div>                              
                                <small>Lokasi</small>
                                <p><?php echo $report['lokasi']; ?></p>
                                <small>Keterangan</small>
                                <p><?php echo $report['keterangan']; ?></p>                                
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
