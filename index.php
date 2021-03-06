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
                        <!-- Navbar Search-->
                        <form class="d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0  <?php if($pagenow != 'index.php'){ echo 'invisible';} ?>">
                            <div class="input-group">
                                <input id="search" class="form-control" type="text" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon2" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- Navbar--> 
                        <h2 class="mt-4">Gangguan Pada Transmit</h2> 
                        <p>Jenis gangguan pada transmit dapat terjadi apabila modem tidak dapat mengirimkan atau meneruskan sinyal informasi ke satelit. </p>                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error TX 3</h4> 
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/tx3.jpg" alt="Kode Error Tx 3" srcset=""  class="img-fluid">
                                    </div>
                                    <h6>Penyebab :</h6> 
                                    <p>Pada penjelasan modem kode error 3 mengindikasikan bahwa transmitter tidak bisa memancar karena tidak dapat berkomunikasi dengan network communication center.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Kondisi ini terjadi selama ketika penerima mengunci sinyal penerimaan dan normalnya memakan wakru sekitar 10 detik, jika situasinya masih berlanjut, Indoor Transmition Unit atau unit transmisi dalam ruangan dimana itu adalah modem satelit perlu diganti.</p>                              
                                    <h6>Tindakan :</h6>
                                    <p>Dilakukan penggantian alat yaitu modem satelit</p>
                                </p>
                            </div>
                        </div>   
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error TX 7</h4> 
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/tx7.jpg" alt="Kode Error Tx 7" srcset=""  class="img-fluid">
                                    </div>
                                    <h6>Penyebab :</h6> 
                                    <p>Pada penjelasan modem kode error 7 mengindikasikan bahwa pemancar tidak tersedia karena masalah penyetelan penerima. Adanya sambungan yang kabel yang putus pada bagian pemancar.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Memeriksa sambungan kabel RG 8koaksial pada sambungan BUC dan modem satelit.</p>    
                                    <h6>Tindakan :</h6>                          
                                    <p>Dilakukan penggantian alat yaitu kabel koaksial RG 8</p>
                                </p>
                            </div>
                        </div>   
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">                                   
                                    <h4>Kode Error TX 9</h4> 
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/tx9.jpg" alt="Kode Error Tx 9" srcset=""  class="img-fluid">
                                    </div>
                                    <h6>Penyebab :</h6> 
                                    <p>Pemancar sedang menyesuaikan untuk mengoptimalkan jaringan. Kode TX 9 normalnya bukan merupakan kode gangguan karena kode ini muncul ketika kita melakukan proses ranging ke hub.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Menunggu proses ranging sampai selesai, proses ini berlangsung dengan waktu 1 hingga 2 menit. Ranging merupakan proses untuk pengetesan transmit antenna ke hub.</p>                              
                                    <h6>Tindakan :</h6>
                                    <p>Jika proses ranging memakan waktu lebih dari 2 menit maka dilakukan penggantian pada modem satelit.</p>
                                </p>
                            </div>
                        </div>  
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error TX 10</h4> 
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/tx10.jpg" alt="Kode Error Tx 10" srcset=""  class="img-fluid">
                                    </div>
                                    <h6>Penyebab :</h6> 
                                    <p>Pemancar tidak dapat berkomunikasi/tersambung dengan network communication center. Hal ini terjadi karena nilai dari signal strength atau SQF dari antena berada dibawah angka 45 point dimana yang merupakan standar nilai untuk melakukan proses ranging atau transmit.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Melakukan pointing/pengarahan antena VSAT pada posisi yang benar, hingga mendapatkan nilai signal strength ≥45 point.</p>                              
                                    <h6>Tindakan :</h6>
                                    <p>Dilakukan pointing atau pengarahan arah pada antena VSAT</p>
                                </p>
                            </div>
                        </div>  
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error TX 13</h4>
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/tx13.jpg" alt="Kode Error Tx 13" srcset=""  class="img-fluid">
                                    </div> 
                                    <h6>Penyebab :</h6> 
                                    <p>Penjelasan modem kode error 13 mengindikasikan bahwa transmitter tidak bisa memancar karena tidak adanya sambungan dengan network communication center. Kondisi ini terjadi kabel koaksial RG8 BUC ke feedhorn tidak dalam keadaan rapat ataupun putus.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Mengecek tegangan jaringan kabel pada sambungan modem satelit ke BUC dengan multimeter, tegangan yang dikeluarkan oleh modem ialah berada pada rentang 12-24 volt jika tegangan yang didapatkan berada pada rentang 12-24 volt maka kabel tersebut dalam keadaan normal atau tidak putus. Pemasangan kabel yang tidak rapat juga dapat mempengaruhi proses transmit. </p>                              
                                    <p>Selanjutnya yang diperiksa pada saat penanganan gangguan transmit adalah ODU voltage pada BUC pada modem satelit. Rentang ODU transmit yang bagus ialah di rentang 90 dan 160 point, jika ODU voltage dibawah 90 maka ODU tidak dalam keadaan normal dan dilakukan penggantian. </p>
                                    <p>Selanjutnya adalah mengecek SQF pada modem satelit apabila nilai SQF kurang dari 45 point maka harus dilakukan pointing pada antena karena untuk melakukan transmit dan pengetesan ranging SQF minimal yang harus didapat adalah 45 point. </p>
                                    <h6>Tindakan :</h6>
                                    <p>Melakukan penggantian alat pada kabel RG 8 dan BUC</p>
                                </p>
                            </div>
                        </div> 
                        <h2 class="mt-4">Gangguan Pada Receive</h2> 
                        <p>Jenis gangguan pada receive dapat terjadi apabila modem tidak dapat menerima sinyal Radio Frequency (RF) dari satelit.</p>                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error RX 3</h4> 
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/rx3.jpg" alt="Kode Error Rx 3" srcset=""  class="img-fluid">
                                    </div>
                                    <h6>Penyebab :</h6> 
                                    <p>Penyebab dari gangguan ini terjadi jika arah antena yang tidak sesuai atau antena dalam keadaan rusak, ataupun kabel yang rusak. Kondisi ini terjadi jika  nilai signal strength atau SQF dibawah 30 point.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Melakukan pointing/pengarahan antena VSAT pada posisi yang benar, hingga mendapatkan nilai signal strength ≥45 point. Dan melakukan pengecekan kabel koaksial pada sambungan LNB dan modem satelit.</p>                              
                                    <h6>Tindakan :</h6>
                                    <p>Dilakukan pointing atau pengarahan arah pada antena VSAT, dan penggantian alat pada kabel koaksial dan modem satelit</p>
                                </p>
                            </div>
                        </div>     
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Kode Error RX 7</h4>
                                    <div class="text-center mt-2 mb-4">
                                        <img src="assets/img/rx7.jpg" alt="Kode Error Rx 7" srcset=""  class="img-fluid">
                                    </div> 
                                    <h6>Penyebab :</h6> 
                                    <p>Penyebab dari gangguan ini terjadi jika arah antena yang tidak sesuai dan mengarah pada satelit yang salah yang tidak sesuai parameter frekuensi ataupun lokasi dari satelit tujuan.</p>  
                                    <h6>Solusi :</h6>
                                    <p>Melakukan pointing/pengarahan antena VSAT pada posisi yang benar, hingga mendapatkan nilai signal strength ≥45 point. Dan melakukan pengecekan kabel koaksial pada sambungan LNB dan modem satelit.</p>                              
                                    <h6>Tindakan :</h6>
                                    <p>Dilakukan pointing atau pengarahan arah pada antena VSAT</p>
                                </p>
                            </div>
                        </div>                          
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include('partials/scripts.php'); ?>
        <script>
            $(document).ready(function(){
                $('#search').keyup(function(){
                
                // Search text
                    var text = $(this).val();

                    if(text == ''){
                        $('.card').show();
                    }else{
    
                    // Hide all content class element
                        $('.card').hide();

                        // Search 
                        $('h4:contains("'+text.toUpperCase()+'")').closest('.card').show();
                    }
               
                
                });
            });
        </script>
    </body>
</html>
