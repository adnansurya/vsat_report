<?php

include('session.php');

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {    
    mysqli_query($conn, 
    "UPDATE device SET device_name='" . $input['device_name'] . "'
     WHERE device_id='" . $input['device_id'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($conn, "DELETE from device WHERE device_id='" . $input['device_id'] . "'");
    
    
} 
// else if ($input['action'] === 'restore') {
//     mysqli_query($koneksi, "UPDATE tbl_brand SET deleted=0 WHERE id_brand='" . $input['id_brand'] . "'");
// }

mysqli_close($conn);
header('Location: ../perangkat.php'); 