<?php
   include('db_access.php');
   session_start();
   
   $email_check = $_SESSION['login_email'];
   
   
   $ses_sql = mysqli_query($conn,"select * from user where email = '".$email_check."'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $nama_session = $row['nama'];
   $role_session = $row['role'];
     
   
   if(!isset($_SESSION['login_email'])){
      header("location:login.php");
      die();
   }
?>