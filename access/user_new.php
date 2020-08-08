<?php
include('session.php');
if(!$role_session == 'superuser'){                
    echo 'Hanya bisa dilakukan oleh Super User';            
}else{
    if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['hp']) && isset($_POST['role']) && isset($_POST['password'])) {        
        $sql = "INSERT INTO user (nama, email, hp, role, pass) VALUES ('".$_POST['nama']."','".$_POST['email']."','".$_POST['hp']."',
        '".$_POST['role']."','".$_POST['password']."')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Gagal menambahkan user";
        }else{
            header('Location: ../user.php'); 
        }
    }else{
        header('Location: ../user.php'); 
    }
} 

?>