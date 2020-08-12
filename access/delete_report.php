<?php
session_start();  
include('session.php');



if($role_session == 'admin'){
    if(isset($_GET['id'])){
        $hapus = mysqli_query($conn, "DELETE from report WHERE report_id='" . $_GET['id'] . "'");
        if(!$hapus){
            $errors[] = 'Gagal menghapus data';   
        }
       
    }else{
        $errors[] = 'Data tidak lengkap';     
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