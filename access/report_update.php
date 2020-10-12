<?php
session_start();  
include('session.php');
include('../partials/global.php');
include('../secret.php');



if($_POST['role'] === 'admin'){

    if(isset($_POST['role']) && isset($_POST['device']) && isset($_POST['device2']) &&
     isset($_POST['device3']) && isset($_POST['jenis']) && isset($_POST['teknisi']) && isset($_POST['report_id']) && isset($_POST['user_id'])){

    
        $result =  mysqli_query($conn, "UPDATE report SET 
        device_id='" . $_POST['device'] . "', 
        device2_id='" . $_POST['device2'] . "', 
        device3_id='" . $_POST['device3'] . "',
        jenis='" . $_POST['jenis'] . "',          
        admin_id='" . $_POST['user_id'] . "',
        teknisi_id='" . $_POST['teknisi'] . "', stat='Sedang Diproses' WHERE report_id='" . $_POST['report_id'] . "'");
        if(!$result){
            $errors[] = 'Gagal update data';
        }else{
            $getUserSql = mysqli_query($conn, "SELECT telegram_id from user WHERE user_id = '".$_POST['teknisi']."'");
            $getUser = mysqli_fetch_array($getUserSql,MYSQLI_ASSOC);
            $chat_id = $getUser['telegram_id'];
            if($chat_id){
                $getReportSql = mysqli_query($conn, "SELECT user.nama AS 'nama_cust', report.* ,
                dev1.device_name as 'nama_dev1' , dev2.device_name as 'nama_dev2', dev3.device_name as 'nama_dev3'
                FROM user, report, device dev1, device dev2, device dev3
                WHERE report.customer_id=user.user_id
                
                AND (report.device_id = dev1.device_id OR report.device_id = 0) 
                AND (report.device2_id = dev2.device_id OR report.device2_id = 0) 
                AND (report.device3_id = dev3.device_id OR report.device3_id = 0)  
                AND report.report_id = '".$_POST['report_id']."' 
                GROUP BY report_id");
                $getReport = mysqli_fetch_array($getReportSql,MYSQLI_ASSOC);

                if($getReport['device_id'] == 0 ) {$dev1 = '';}else{$dev1 =$getReport['nama_dev1']; }
                if($getReport['device2_id'] == 0 ) {$dev2 = '';}else{$dev2 =$getReport['nama_dev2']; }
                if($getReport['device3_id'] == 0 ) {$dev3 = '';}else{$dev3 =$getReport['nama_dev3'];}                
                
                $pesan = "Laporan Baru!".PHP_EOL.PHP_EOL." Nama Customer : ". $getReport['nama_cust']
                .PHP_EOL." Waktu : ". $getReport['waktu_lapor']
                .PHP_EOL." Alamat : ". $getReport['lokasi']    
                .PHP_EOL." Jenis Gangguan : ". $getReport['jenis']                                  
                .PHP_EOL." Keterangan : ". $getReport['keterangan']    
                .PHP_EOL.PHP_EOL." List Perangkat : "  
                .PHP_EOL."- ". $dev1   
                .PHP_EOL."- ". $dev2
                .PHP_EOL."- ". $dev3
                .PHP_EOL.PHP_EOL."URL Laporan : ".PHP_EOL."https://laporvsat.000webhostapp.com/detail.php?id=".$_POST['report_id'];
                sendMessage($chat_id, $pesan, $token);
            }
            
            
        }
    }else{

        $errors[] = 'Data tidak lengkap';        
    
    }
 
}elseif($_POST['role'] === 'teknisi'){



    if(isset($_POST['role']) && isset($_POST['report_id']) && isset($_POST['user_id']) && isset($_POST['tindakan']) && isset($_POST['terdampak']) && isset($_POST['sinyal']) && !empty($_FILES["image"]["name"])){

        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $ext_arr = explode('.',$file_name);
        $file_ext=strtolower(end($ext_arr));
    
        $temp = explode(".", $file_name);
        $newfilename = $timestamp .'-'.$_POST['report_id']. '.' . end($temp);
    
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
                
            
            if(move_uploaded_file($file_tmp,"../report_img/".$newfilename)){

                $result =  mysqli_query($conn, "UPDATE report SET 
                tindakan='" . $_POST['tindakan'] . "', 
                terdampak='" . $_POST['terdampak'] . "', 
                sinyal='" . $_POST['sinyal'] . "', 
                error_id='" . $_POST['kode_error'] . "',
                gambar='" . $newfilename . "', 
                waktu_selesai='" . $waktu . "',               
                stat='Selesai' 
                WHERE report_id='" . $_POST['report_id'] . "' AND teknisi_id='" . $_POST['user_id'] . "'");
                if(!$result){
                    $errors[]= 'Gagal update data';
                }
            }else{
                $errors[]= "Kesalahan Upload File";
            }
    
            
            
        }
      
        
    }else{

        $errors[]= 'Data tidak lengkap';        
    
    }

}else{

    $errors[]= "Role tidak diketahui";        
}

if(empty($errors)==true){

    header("location: ../proses.php");   
    die(); 

}else{
    print_r($errors[0]);
    // echo $errors;
}

?>