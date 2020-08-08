<?php

   include('db_access.php');
  
   
   
   if(!isset($_SESSION['login_email'])){
      header("location:login.php");
      die();
   }else{
      $email_check = $_SESSION['login_email'];
   
      $ses_sql = mysqli_query($conn,"select * from user where email = '".$email_check."'");
      
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      
      $nama_session = $row['nama'];
      $role_session = $row['role'];
      $id_session = $row['user_id'];
   }
?>