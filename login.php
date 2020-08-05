<?php 
    include("access/db_access.php");
    session_start();

    if(isset($_SESSION['login_user'])){
        header("location:index.php");        
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
       $myemail = mysqli_real_escape_string($conn,$_POST['email']);
       $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
       
       $sql = "SELECT * FROM user WHERE email = '".$myemail."' and pass = '".$mypassword."'";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
       $email = $row['email'];
       
       $count = mysqli_num_rows($result);

       //echo $count;
       
       // If result matched $myusername and $mypassword, table row must be 1 row         
       if($count == 1) {
        //   session_register("myname");
          $_SESSION['login_email'] = $email;                          
          header("location: index.php");
         

       }else {
          $error = "Your Login Name or Password is invalid";
          echo $error;

       }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/global.php') ?>
        <?php include('partials/head.php'); ?>
        
        <title><?php echo $webname; ?> - Login</title>         
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Masukkan Email" name="email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Masukkan Password" name="password"/>
                                            </div>                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                                <button class="btn btn-primary" href="index.php" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       <?php include('partials/scripts.php'); ?>
    </body>
</html>
