<?php
session_start();  
include('session.php');

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {    
    mysqli_query($conn, 
    "UPDATE user SET nama='" . $input['nama'] . "', email='" . $input['email'] . "', hp='" . $input['hp'] . "', role='" . $input['role'] . "', pass='" . $input['pass'] . "'
     WHERE user_id='" . $input['user_id'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($conn, "DELETE from user WHERE user_id='" . $input['user_id'] . "'");
    
    
} 
// else if ($input['action'] === 'restore') {
//     mysqli_query($koneksi, "UPDATE tbl_brand SET deleted=0 WHERE id_brand='" . $input['id_brand'] . "'");
// }

mysqli_close($conn);
header('Location: ../perangkat.php'); 


?>