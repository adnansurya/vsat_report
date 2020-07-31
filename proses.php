<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/global.php') ?>
        <?php include('partials/head.php'); ?>
        
        <title><?php echo $webname; ?> - Blank</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Proses Gangguan</h1>                                                
                        <div class="mt-4 list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Bank BNI</h5>
                                <small>2020-07-30 23:32:33</small>
                                </div>
                                <p class="mb-1">Jl. Toddopuli 5 setapak 1 No. 5</p>
                                <small>Data tidak dapat terkirim</small>
                            </a>
                        </div>                                           
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
    </body>
</html>
