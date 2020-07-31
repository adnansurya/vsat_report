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
                        <h1 class="mt-4">Lapor Gangguan</h1>                        
                        <div class="card mt-4">
                            <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="exampleFormControlTextarea1">Lokasi Gangguan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                        </div>
                                    </div>                                    
                                </div>                               
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="exampleFormControlTextarea2">Keterangan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.html">Kirim Laporan</a></div>
                            </form>
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
