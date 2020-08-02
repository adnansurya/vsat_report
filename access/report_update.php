<?php

include('session.php');

if(isset($_POST['role']) && isset($_POST['device']) && isset($_POST['teknisi']) && isset($_POST['report_id']) && isset($_POST['user_id'])){

    if($_POST['role'] === 'admin'){
        $result =  mysqli_query($conn, "UPDATE report SET device_id='" . $_POST['device'] . "', admin_id='" . $_POST['user_id'] . "',
        teknisi_id='" . $_POST['teknisi'] . "', stat='Sedang Diproses' WHERE report_id='" . $_POST['report_id'] . "'");
        if($result){
            header("location: ../proses.php");    
        }else{
            echo 'Gagal update data';
        }
    }else{

        echo "Role tidak diketahui";        
    }
 
}else{

    echo 'Data tidak lengkap';
    echo $_POST['report_id'];

}

?>