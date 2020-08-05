<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include('partials/global.php');             
            include('partials/head.php'); 
            include('access/session.php');

            if(!$role_session == 'admin'){                
                header("location:index.php");                
            }
            
            
        ?>
        
        <title><?php echo $webname; ?> - Daftar Perangkat</title>        
    </head>
    <body>
        <?php include('partials/topbar.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Perangkat</h1>                        
                         
                        <div class="card mb-4 mt-4">                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="deviceTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr> 
                                                <th>No.</th>
                                                <th>Nama Perangkat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $load = mysqli_query($conn, "SELECT * FROM device ORDER BY device_id");   
                                                while ($row = mysqli_fetch_array($load)){
                                                    echo '<tr>
                                                            <td>'.$row['device_id'].'</td>
                                                            <td>'.$row['device_name'].'</td>
                                                        </tr>';
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>                          
                        </div> 
                        <div class="card mb-4 mt-4">                           
                            <div class="card-body">
                                <h5>Tambah Baru</h5>
                                <form action="access/device_new.php" method="post">
                                    <div class="form-group">                                        
                                        <input class="form-control py-4" id="name" type="text" placeholder="Masukkan Nama Perangkat" name="device_name" required>
                                    </div>                                                                               
                                    <div class="form-group text-right mt-4 mb-0">                                                
                                        <button class="btn btn-primary" type="submit">Tambahkan</button>
                                    </div>
                                </form>
                            </div>                          
                        </div>                      
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
        <script src="js/jquery.tabledit.js"></script>
        <script>
              $('#deviceTable').Tabledit({
                    url: 'access/device_update.php',
                    columns: {
                        identifier: [0, 'device_id'],
                        restoreButton: false,                        
                        editable: [[1, 'device_name']]
                    },buttons: {
                        delete: {
                            class: 'btn btn-sm btn-danger',
                            html: 'Hapus',
                            action: 'delete'
                        },
                        save: {
                            class: 'btn btn-sm btn-success',
                            html: 'Simpan'
                        },
                        edit: {
                            class: 'btn btn-sm btn-info',
                            html: 'Edit',
                            action: 'edit'
                        }
                    },
                    onSuccess: function(data, textStatus, jqXHR) {
                        console.log('onSuccess(data, textStatus, jqXHR)');
                        console.log(data);
                        console.log(textStatus);
                        console.log(jqXHR);
                        // window.location.href = window.location.pathname + window.location.search + window.location.hash;
                        location.reload();
                    }
                });
        </script>
    </body>
</html>
