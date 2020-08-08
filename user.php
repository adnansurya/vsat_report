<?php 
session_start();  
include('partials/global.php') ?>
<?php include('access/session.php');
if(!($role_session == 'superuser')){                
    header("location:index.php");                
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <?php 
            
            include('partials/head.php'); 
          

            
        ?>
        <title><?php echo $webname; ?> - Daftar User</title>        
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
                                    <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr> 
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>HP</th>
                                                <th>Role</th>  
                                                <th>Password</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $load = mysqli_query($conn, "SELECT * FROM user ORDER BY user_id");   
                                                while ($row = mysqli_fetch_array($load)){
                                                    echo '<tr>
                                                            <td>'.$row['user_id'].'</td>
                                                            <td>'.$row['nama'].'</td>
                                                            <td>'.$row['email'].'</td>
                                                            <td>'.$row['hp'].'</td>
                                                            <td>'.$row['role'].'</td>
                                                            <td>'.$row['pass'].'</td>
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
                                <form action="access/user_new.php" method="post" id=newUser>
                                    <div class="form-group">                                        
                                        <input class="form-control py-4" type="text" placeholder="Masukkan Nama Pengguna" name="nama" required>
                                    </div> 
                                    <div class="form-group">                                        
                                        <input class="form-control py-4" type="text" placeholder="Masukkan Email " name="email" required>
                                    </div> 
                                    <div class="form-group">                                        
                                        <input class="form-control py-4" type="text" placeholder="Masukkan Password" name="password" required>
                                    </div>  
                                    <div class="form-group">                                        
                                        <input class="form-control py-4" type="text" placeholder="Masukkan No. HP" name="hp" required>
                                    </div> 
                                    <div class="form-group">                                                                                
                                        <small>Role</small>
                                        <select form="newUser" name="role" class="custom-select"> ';
                                            <option value="customer">Customer</option>
                                            <option value="admin">Admin</option>
                                            <option value="teknisi">Teknisi</option>
                                        </select>                                        
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
              $('#userTable').Tabledit({
                    url: 'access/user_update.php',
                    columns: {
                        identifier: [0, 'user_id'],
                        restoreButton: false,                        
                        editable: [
                            [1, 'nama'],
                            [2, 'email'],
                            [3, 'hp'],
                            [4, 'role'],
                            [5, 'pass']
                        ]
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
