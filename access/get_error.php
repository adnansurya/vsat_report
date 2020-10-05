<?php
    include('db_access.php');
    if(isset($_GET['jenis'])){
        $resObj = new \stdClass();
    
        $arr = array();

        $load = mysqli_query($conn, "SELECT * FROM error_list WHERE jenis_error='".$_GET['jenis']."'");

        if($load){
            $rows = array();
            while($r = mysqli_fetch_assoc($load)) {
                $rows[] = $r;
            }
            $myarray = json_encode($rows); 
            
            // print json_encode(array('error_list' => $rows));
            $resObj -> result = "success";
            $resObj -> data = $rows;
        }else{
            $resObj -> result = "failed";
            $resObj -> data = "not found";
        }

        echo json_encode($resObj);
        
        
    
    }
?>