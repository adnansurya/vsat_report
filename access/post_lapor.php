<?php 
    include('session.php');

    if($role_session != 'customer'){
        header("location: index.php");
    }

    if(isset($_POST['lokasi']) && isset($_POST['keterangan'])){
        $sql = "INSERT INTO report (customer_id, waktu_lapor, stat) VALUES ('".$row['user_id']."','$waktu','Belum Diproses')";
        if (!mysqli_query($conn,$sql)){
        
            echo "Error description: " . mysqli_error($conn);
                               
        }else{
            header("location: ../histori.php");
        }

    }else{
        echo "Data tidak boleh kosong";
    }

    echo $_POST['lokasi'];
    echo $_POST['keterangan'];


    

?>