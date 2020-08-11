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
   
    $report_sql = mysqli_query($conn,"SELECT cust.nama as 'nama_cust', admin.nama as 'nama_admin' , tek.nama as 'nama_tek', report.* , 
    dev1.device_name as nama_dev1 , dev2.device_name as nama_dev2, dev3.device_name as nama_dev3 
    FROM user cust, user admin, user tek, report, device dev1, device dev2, device dev3 WHERE report.customer_id = cust.user_id AND report.admin_id = admin.user_id AND (report.device_id = dev1.device_id OR report.device_id = 0) AND (report.device2_id = dev2.device_id OR report.device2_id = 0) AND (report.device3_id = dev3.device_id OR report.device3_id = 0) AND report.report_id = '".$_GET['id']."' GROUP BY report_id");

    $report = mysqli_fetch_array($report_sql,MYSQLI_ASSOC);

    if($report['stat'] != "Selesai"){
        header("location:index.php");    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php         
        include('partials/head.php'); 
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Laporan </title>
</head>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          
            <div class="d-flex w-100 justify-content-between mt-4 bg-light p-3">
                <a class="navbar-brand" >Laporan - #<?php echo $report['report_id']; ?></a>
                <button class="btn btn-primary" onclick="printLaporan()">Print</button>
            </div>             
        </div>        
    </div>
    <div class="row mt-4 mb-4">
        <div class="container border printed" id="forPrint">
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><small>ID Laporan : </small>#<?php echo $report['report_id']; ?></p>
                </div>
                <div class="col-md-6 text-md-right">
                    <p><small>Laporan Masuk : </small><?php echo $report['waktu_lapor']; ?></p>       
                </div>             
            </div>
            <hr>
            <small>Admin</small>
            <p id="adminTxt"><?php echo $report['nama_admin']; ?></p>
            <small>Jenis Gangguan</small>
            <p id="jenisTxt"><?php echo $report['jenis']; ?></p>
            <small>List Perangkat :</small>
            <ul>
                <li id="dev1Txt"><?php echo $report['nama_dev1']; ?></li>
                <li id="dev2Txt"><?php echo $report['nama_dev2']; ?></li>
                <li id="dev3Txt"><?php echo $report['nama_dev3']; ?></li>
            </ul>
            <hr>
            <p class="text-right"><small>Selesai : </small><?php echo $report['waktu_selesai']; ?></p>
            <small>Teknisi</small>
            <p id="teknisiTxt"><?php echo $report['nama_tek']; ?></p>
                        
           
            <small>Tindakan</small>
            <p id="tindakanTxt"><?php echo $report['tindakan']; ?></p>
            <small>Signal Strength</small>
            <p id="sinyalTxt"><?php echo $report['sinyal']; ?></p>
            <small>Perangkat Terdampak</small>
            <p id="terdampakTxt"><?php echo $report['terdampak']; ?></p>

            <div class="text-center mt-2 mb-4">
                <img id="gambarImg" src="<?php echo 'report_img/'.$report['gambar']; ?>" alt="Gambar" class="img-thumbnail"/>
            </div>
            
                
        </div>
    </div>
    <div id="elementH"></div>
</div>
<?php include('partials/scripts.php'); ?> 
<script type="text/javascript" src="js/printThis.js"></script>
<script>

    // $(document).ready(function() {

        function printLaporan(){
           $('.printed').printThis({
               base : 'vsat_report'
           });
        } 
    // });
</script>
</body>
</html>