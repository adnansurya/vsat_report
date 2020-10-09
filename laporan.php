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
        
        <title><?php echo $webname; ?> - Data Laporan</title> 
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
                                                <th>ID</th>                                               
                                                <th>Nama</th>
                                                <th>Lokasi</th>
                                                <th>Keterangan</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                        <?php                                            
                                            $load = mysqli_query($conn, "SELECT cust.nama AS nama_cust, admin.nama AS nama_admin, tek.nama AS nama_tek,dev1.device_name AS nama_dev1, dev2.device_name AS nama_dev2, dev3.device_name AS nama_dev3, report.* , error_list.kode_error
                                            from user cust, user admin, user tek, report, error_list, device dev1, device dev2, device dev3
                                            WHERE (report.admin_id = admin.user_id OR report.admin_id = 0) AND
                                            (report.teknisi_id = tek.user_id OR report.teknisi_id = 0) AND 
                                            (report.customer_id = cust.user_id OR report.customer_id = 0) AND
                                            (report.device_id = dev1.device_id OR report.device_id = 0) AND
                                            (report.device2_id = dev2.device_id OR report.device2_id = 0) AND
                                            (report.device3_id = dev3.device_id OR report.device3_id = 0) AND 
                                            (report.error_id = error_list.id_error OR report.error_id = 0)                                           
                                            GROUP BY report_id ORDER BY report_id DESC");   
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
                                                echo '<td>';

                                                if($row['stat'] == 'Belum Diproses'){
                                                    echo '<button type="button" class="btn btn-light btn-sm disabled"><i class="fas fa-ban"></i></button>';
                                                }else{
                                                    echo '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" 
                                                    data-id="'.$row['report_id'].'" data-stat="'.$row['stat'].'" data-jenis="'.$row['jenis'].'"
                                                    data-tindakan="'.$row['tindakan'].'" data-sinyal="'.$row['sinyal'].'" 
                                                    data-terdampak="'.$row['terdampak'].'" data-gambar="'.$row['gambar'].'"  data-error="'.$row['kode_error'].'" ';
                                                    
                                                    if($row['admin_id'] != 0){
                                                        echo ' data-admin="'.$row['nama_admin'].'" ';
                                                    }else{
                                                        echo ' data-admin="-" ';
                                                    }

                                                    if($row['teknisi_id'] != 0){
                                                        echo ' data-tek="'.$row['nama_tek'].'" ';
                                                    }else{
                                                        echo ' data-tek="-" ';
                                                    }

                                                    if($row['device_id'] != 0){
                                                        echo ' data-dev1="'.$row['nama_dev1'].'" ';
                                                    }else{
                                                        echo ' data-dev1="-" ';
                                                    }

                                                    if($row['device2_id'] != 0){
                                                        echo ' data-dev2="'.$row['nama_dev2'].'" ';
                                                    }else{
                                                        echo ' data-dev2="-" ';
                                                    }

                                                    if($row['device3_id'] != 0){
                                                        echo ' data-dev3="'.$row['nama_dev3'].'" ';
                                                    }else{
                                                        echo ' data-dev3="-" ';
                                                    }
                                                    
                                                    echo '><i class="fas fa-search"></i></button>';
                                                }
                                                    
                                                if($row['stat'] == 'Selesai'){
                                                    echo '<a type="button" class="btn btn-success btn-sm" href="download.php?id='.$row['report_id'].'"><i class="fas fa-download"></i></a>';
                                                }    
                                                    
                                                                                           
                                            echo '</td></tr>';
                                            }                      
                                        ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <small>Admin</small>
                                <p id="adminTxt"></p>
                                <small>Jenis Gangguan</small>
                                <p id="jenisTxt"></p>
                                <small>Kode Error</small>
                                <p id="errorTxt"></p>
                                <small>List Perangkat</small>
                                <ul>
                                    <li id="dev1Txt"></li>
                                    <li id="dev2Txt"></li>
                                    <li id="dev3Txt"></li>
                                </ul>
                                <small>Teknisi</small>
                                <p id="teknisiTxt"></p>
                               
                                            
                                <div id="finishDiv">
                                    <small>Tindakan</small>
                                    <p id="tindakanTxt"></p>
                                    <small>Signal Strength</small>
                                    <p id="sinyalTxt"></p>
                                    <small>Perangkat Terdampak</small>
                                    <p id="terdampakTxt"></p>
                                    <img id="gambarImg" src="#" alt="Gambar" class="img-thumbnail"/>
                                </div>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>                                
                            </div>
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

                $('#detailModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var idLaporan = button.data('id');
                    var stat = button.data('stat');
                   
                    var modal = $(this);
                    modal.find('.modal-title').text('Data Laporan #' + idLaporan);                    
                    modal.find('#adminTxt').text(button.data('admin'));
                    modal.find('#jenisTxt').text(button.data('jenis'));
                    modal.find('#dev1Txt').text(button.data('dev1'));
                    modal.find('#dev2Txt').text(button.data('dev2'));
                    modal.find('#dev3Txt').text(button.data('dev3'));
                    modal.find('#teknisiTxt').text(button.data('tek')); 
                    modal.find('#errorTxt').text(button.data('error'));                   

                    if(stat == 'Selesai'){
                        $('#finishDiv').css("display", "block");
                        modal.find('#sinyalTxt').text(button.data('sinyal'));
                        modal.find('#terdampakTxt').text(button.data('terdampak'));
                        modal.find('#tindakanTxt').text(button.data('tindakan'));
                        modal.find('#gambarImg').attr('src','report_img/'+button.data('gambar'));
                    }else{
                        $('#finishDiv').css("display", "none");
                    }
                   
                })
            });
        </script>
    </body>
</html>
