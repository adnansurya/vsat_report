<?php
session_start();  
include('session.php');
if(isset($_POST['device_name'])) {
    $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
    $sql = "INSERT INTO device (device_name) VALUES ('".$device_name."')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "Gagal menambahkan perangkat";
    }else{
        header('Location: ../perangkat.php'); 
    }
}else{
    header('Location: ../perangkat.php'); 
}
?>