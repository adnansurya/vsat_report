<?php 
session_start();  
include('partials/global.php') ?>
<?php include('access/session.php'); ?>

        
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/head.php'); ?>
        <title><?php echo $webname; ?> - Dashboard</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Selamat Datang</h1>                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    Memberikan layanan terbaik merupakan kepuasan bagi kami.                                   
                                </p>
                            </div>
                        </div>                        
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
    </body>
</html>
