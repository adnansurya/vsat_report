<?php
session_start();  
include('session.php');



if($_POST['role'] === 'admin'){

    if(isset($_POST['role']) && isset($_POST['device']) && isset($_POST['device2']) && isset($_POST['device3']) && isset($_POST['jenis']) && isset($_POST['teknisi']) && isset($_POST['report_id']) && isset($_POST['user_id'])){

    
        $result =  mysqli_query($conn, "UPDATE report SET 
        device_id='" . $_POST['device'] . "', 
        device2_id='" . $_POST['device2'] . "', 
        device3_id='" . $_POST['device3'] . "',
        jenis='" . $_POST['jenis'] . "',  
        admin_id='" . $_POST['user_id'] . "',
        teknisi_id='" . $_POST['teknisi'] . "', stat='Sedang Diproses' WHERE report_id='" . $_POST['report_id'] . "'");
        if(!$result){
            $errors[] = 'Gagal update data';
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