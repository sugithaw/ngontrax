<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.js"></script>
    </head>
    
    <body class="container">

    <div id="load-animation"></div>

        <div class="row">
            <div class="col l12 s12 m12">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="card">
                            <div class="card-content">
                                <center><img src="../pics/sys/logo-32-blue.png"></center>
                                <br>
                                <h5>Hai, selamat datang di Ngontrax</h5>
                                <p>Ngontrax adalah portal dan pusat informasi bagi anda yang memiliki bangunan utnuk di sewakan ataupun bagi anda yang sedang memerlukan tempat tinggal sementara. Terdapat 2 jenis akun yang bisa anda miliki di Ngontrax yaitu Pemilik dan Pengguna.</p>
                                <p>Penjelasan lebih lanjut tentang pembuatan jenis akun dapat dibaca <a href="">pada link ini.</a>
                                <p>Disarankan untuk membaca <a href="">syarat dan ketentuan</a> sebelum anda mendaftar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 m12 s12">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header">Daftar Sebagai Pemilik</div>
                                <div class="collapsible-body">
                                    <p>Apabila anda memiliki bangunan yang ingin di kontrakan, anda dapat membuat akun sebagai pemilik, karena akun ini dapat memasang iklan serta memanajemen bangunan, kamar dan penghuni dari kontrakan anda<br><br><span><center><a href="form/register-pemilik.php" class="btn blue">OK, Saya pilih Pemilik</a></span></center></p>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header">Daftar Sebagai Pengguna</div>
                                <div class="collapsible-body"><p>Apabila anda ingin mencari informasi tentang bangunan kontrakan dan ingin menjadi penghuni, maka akun ini lah yang harus anda buat<br><br><span><center><a href="#!" class="btn blue">Saya ingin menjadi Pengguna</a></span></center></p></div>
                            </li>
                        </ul>
                    </div>
                </div>
                    
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.collapsible').collapsible({
                accordion : false;
                });
            });
        </script>
    </body>
</html>