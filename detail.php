<?php 
session_start();  
include('partials/global.php') ?>
<?php include('access/session.php');
if(!($role_session == 'admin' || $role_session == 'teknisi')){                
    header("location:index.php");                
}

if(!isset($_GET['id'])){
    header("location:index.php");   
}else{

    if($role_session === 'admin'){
        $report_sql = mysqli_query($conn,"SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* FROM user cust, user admin, report WHERE report.customer_id = cust.user_id AND( report.admin_id = admin.user_id OR report.admin_id = 0) AND report.report_id = '".$_GET['id']."' GROUP BY report_id");
    }elseif($role_session === 'teknisi'){
        $report_sql = mysqli_query($conn,"SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , report.* , dev1.device_name as nama_dev1 , dev2.device_name as nama_dev2, dev3.device_name as nama_dev3 FROM user cust, user admin, report, device dev1, device dev2, device dev3 WHERE report.customer_id = cust.user_id AND report.admin_id = admin.user_id AND (report.device_id = dev1.device_id OR report.device_id = 0) AND (report.device2_id = dev2.device_id OR report.device2_id = 0) AND (report.device3_id = dev3.device_id OR report.device3_id = 0) AND report.report_id = '".$_GET['id']."' GROUP BY report_id");
    }
    

    $report = mysqli_fetch_array($report_sql,MYSQLI_ASSOC);
}
?> 

        
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/head.php'); ?>
        <title><?php echo $webname; ?> - Detail Laporan</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-8">
                                <h1>Detail Laporan</h1>                                                    
                            </div>
                            <?php
                                if($role_session === 'admin'){
                                echo '<div class="col-md-4 text-md-right">
                                        <a href="access/delete_report.php?id='.$report['report_id'].'" class="btn btn-danger mt-3 btn-sm"><i class="fas fa-trash"></i> HAPUS</a>
                                    </div>';                                    
                                }
                            ?>
                            
                            
                        </div>
                                
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <small>Nama Pelanggan</small>
                                    <small>ID Laporan</small>                                                                                                         
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <p><?php echo $report['nama_cust']; ?></p>
                                    <p>#<?php echo $report['report_id']; ?></p>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <small>Lokasi</small>
                                        <p><?php echo $report['lokasi']; ?></p>
                                    </div>
                                    <div class="col-md-4 text-md-right">
                                        <small>Waktu Laporan</small>
                                        <p><?php echo $report['waktu_lapor']; ?></p>
                                    </div>
                                </div>  
                                <small>Status</small>
                                <p>
                                    <?php echo $report['stat'];?>
                                </p>                                                                                           
                                <small>Keterangan</small>
                                <p><?php echo $report['keterangan']; ?></p>                                
                            </div>                           
                        </div>
                       
                       
                       
                        <?php 
                            if($role_session == 'admin' && $report['stat'] != 'Selesai'){
                                echo '<div class="card border-warning mt-4">
                                        <div class="card-body">  
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <small>Pilih Teknisi</small>
                                                    <select form="reportForm" name="teknisi" class="custom-select"> ';

                                $load = mysqli_query($conn, "SELECT * FROM user WHERE role = 'teknisi' ORDER BY user_id");   
                                while ($row = mysqli_fetch_array($load)){
                                    echo '<option value="'.$row['user_id'].'"';
                                    if($report['teknisi_id'] == $row['user_id']){
                                        echo ' selected ';
                                    }
                                    echo '>'.$row['nama'].'</option>';

                                } 

                                echo ' </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <small>Pilih Perangkat 1</small>
                                        <select form="reportForm" name="device" class="custom-select">   
                                        <option value="0">----Tidak Ada----</option>';
                                
                                $load = mysqli_query($conn, "SELECT * FROM device ORDER BY device_name");   
                                while ($row = mysqli_fetch_array($load)){
                                    echo '<option value="'.$row['device_id'].'"';
                                    if($report['device_id'] == $row['device_id']){
                                        echo ' selected ';
                                    }
                                    echo '>'.$row['device_name'].'</option>';

                                }
                                echo ' </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>Pilih Perangkat 2</small>
                                    <select form="reportForm" name="device2" class="custom-select">
                                    <option value="0">----Tidak Ada----</option>';
                            
                                $load = mysqli_query($conn, "SELECT * FROM device ORDER BY device_name");   
                                while ($row = mysqli_fetch_array($load)){
                                    echo '<option value="'.$row['device_id'].'"';
                                    if($report['device2_id'] == $row['device_id']){
                                        echo ' selected ';
                                    }
                                    echo '>'.$row['device_name'].'</option>';

                                }

                                echo ' </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>Pilih Perangkat 3</small>
                                    <select form="reportForm" name="device3" class="custom-select">
                                    <option value="0">----Tidak Ada----</option>';
                            
                                $load = mysqli_query($conn, "SELECT * FROM device ORDER BY device_name");   
                                while ($row = mysqli_fetch_array($load)){
                                    echo '<option value="'.$row['device_id'].'"';
                                    if($report['device3_id'] == $row['device_id']){
                                        echo ' selected ';
                                    }
                                    echo '>'.$row['device_name'].'</option>';

                                }

                                echo '</select>
                                                </div>
                                            </div>                                
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                <form action="access/report_update.php" method="post" id="reportForm">
                                                    <input type="hidden" name="user_id" value="'.$id_session.'">  
                                                    <input type="hidden" name="role" value="'.$role_session.'">    
                                                    <input type="hidden" name="report_id" value="'.$report['report_id'].'"> 
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="exampleFormControlTextarea1">Jenis Gangguan</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="jenis" rows="2" required>'.$report['jenis'].'</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-info btn-block">PROSES</button>                         
                                                </form>
                                                    
                                                </div>
                                            </div>     
                                        </div>
                                    </div> ';
                                
                                
                            }elseif($role_session == 'teknisi' && $report['stat'] != 'Selesai'){
                                echo '<div class="card border-warning mt-4">
                                        <div class="card-header text-center">'.$report['nama_admin'].' <span class="badge badge-warning">Admin</span></div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <small>Jenis Gangguan</small>                                                                                                         
                                                        <p>'.$report['jenis'].'</p>                                    
                                                    </div>
                                                </div>
                                                <div class="row">                                               
                                                    <div class="col-md-12">
                                                        <small>List Perangkat :</small>
                                                        <ul>';

                                                        if($report['device_id'] != 0){
                                                            echo '<li>'.$report['nama_dev1'].'</li>';
                                                        }else{
                                                            echo '<li> - </li>';
                                                        }
                                                        if($report['device2_id'] != 0){
                                                            echo '<li>'.$report['nama_dev2'].'</li>';
                                                        }else{
                                                            echo '<li> - </li>';
                                                        }

                                                        if($report['device3_id'] != 0){
                                                            echo '<li>'.$report['nama_dev3'].'</li>';
                                                        }else{
                                                            echo '<li> - </li>';
                                                        }
                                    
                                    echo                '</ul>
                                                    </div>
                                                </div>                                                                         
                                            </div>                           
                                        </div>';


                                    echo '<div class="card border-success mt-4">
                                            <div class="card-body">
                                            <form action="access/report_update.php" method="post" enctype="multipart/form-data">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="user_id" value="'.$id_session.'">  
                                                        <input type="hidden" name="role" value="'.$role_session.'">    
                                                        <input type="hidden" name="report_id" value="'.$report['report_id'].'"> 
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="exampleFormControlTextarea1">Tindakan</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="tindakan" rows="3" required></textarea>
                                                        </div>
                                                    </div>                                    
                                                </div>                               
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Pilih File Gambar</label>
                                                            </div>
                                                        </div>
                                                        <img id="blah" src="#" alt="Preview" class="img-thumbnail"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4 mb-0"><button type="submit" name="submit" class="btn btn-primary btn-block">Simpan Laporan</a></div>
                                            </form>                             
                                            </div>                           
                                        </div>';


                                
                            }
                            
                                                        

                                
                        ?>                      
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
        <script>
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $("#customFile").change(function() {
                readURL(this);
            });   
        </script>
    </body>
</html>
