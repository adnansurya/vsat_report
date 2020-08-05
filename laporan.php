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
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />       
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Laporan</h1>                        
                        <div class="card mb-4 mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr> 
                                                <th>No.</th>                                               
                                                <th>Nama Pelanggan</th>
                                                <th>Lokasi</th>
                                                <th>Keterangan</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                        <?php                                            
                                            $load = mysqli_query($conn, "SELECT user.nama AS nama_cust, report.* from user, report GROUP BY report_id ORDER BY report_id DESC");   
                                            while ($row = mysqli_fetch_array($load)){
                                            echo '<tr>';
                                                echo '<td>'.$row['report_id'].'</td>';
                                                echo '<td>'.$row['nama_cust'].'</td>';
                                                echo '<td>'.$row['lokasi'].'</td>';
                                                echo '<td>'.$row['keterangan'].'</td>';
                                                echo '<td>'.$row['waktu_lapor'].'</td>';
                                                if($row['stat'] == 'Belum Diproses'){
                                                    echo  '<td><span class="badge badge-danger">'.$row['stat'].'</span></td>'; 
                                                }elseif($row['stat'] == 'Sedang Diproses'){
                                                    echo  '<td><span class="badge badge-warning">'.$row['stat'].'</span></td>';                                                    
                                                }elseif($row['stat'] == 'Selesai'){
                                                    echo  '<td><span class="badge badge-success">'.$row['stat'].'</span></td>'; 
                                                }else{
                                                    echo  '<td><span class="badge badge-light">'.$row['stat'].'</span></td>';
                                                } 
                                                // echo '<td>'.$row['stat'].'</td>';
                                                echo '<td>
                                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i></button>                                                    
                                                </td>';                                                
                                            echo '</tr>';
                                            }                      
                                        ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    </body>
</html>
