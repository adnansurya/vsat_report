<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/global.php') ?>
        <?php include('partials/head.php'); ?>
        
        <title><?php echo $webname; ?> - Blank</title> 
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />       
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Laporan</h1>                        
                        <div class="card mb-4 mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr> 
                                                <th>No.</th>                                               
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>Keterangan</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bank BNI</td>
                                                <td>Jl. Monginsidi</td>
                                                <td>Data tidak terkirim</td>
                                                <td>2020-07-29 23:25:44</td>
                                                <td>Belum Diproses</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i></button>                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Indomaret</td>
                                                <td>Jl. Pengayoman</td>
                                                <td>Koneksi putus-putus</td>
                                                <td>2020-07-29 23:25:44</td>
                                                <td>Sedang Diproses</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i></button>                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    </body>
</html>
