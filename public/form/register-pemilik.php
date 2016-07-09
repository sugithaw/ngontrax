<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.js"></script>
    </head>
    
    <body class="container">

    <div id="load-animation"></div>

        <div class="row">
            <div class="col l12 s12 m12">
                <div class="card">
                    <div class="card-content">
                    <center><img src="../../pics/sys/logo-32-blue.png"></center>
                        <div class="card-title">Formulir Pemilik</div>
                        <p>Silahkan lengkapi formulir berikut untuk mendaftarkan diri anda.</p>
                        <div class="divider"></div>

                        <br><br>

                        <form action="../controler/register-pemilik.php?command=add" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <input name="nama_depan" id="nama-depan" type="text" required>
                                    <label for="nama-depan">Nama Depan</label>
                                </div>
                                <div class="input-field col l6 m10 s12">
                                    <input name="nama_belakang" id="nama-belakang" type="text" required>
                                    <label for="nama-belakang">Nama Belakang</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <input name="no_identitas" id="no-identitas" type="text" required>
                                    <label for="no-identitas">No Identitas</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <p class="teal-text">Jenis Kelamin</p>
                                    <input class="with-gap" name="jk" type="radio" id="L" value="L" checked />
                                    <label for="L">Laki - Laki</label>
                                    <input class="with-gap" name="jk" type="radio" id="P" value="P" />
                                    <label for="P">Perempuan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                     <input type="date" class="datepicker" name="tgl_lahir" id="tgl-lahir">
                                     <label for="tgl-lahir">Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <input name="no_telp" id="no_telp" type="number" required>
                                    <label for="no-telp">No Telp</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <input name="email" id="email" type="email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6 m10 s12">
                                    <input name="pass1" id="pass1" type="password" required>
                                    <label for="pass1">Pass</label>
                                </div>
                                <div class="input-field col l6 m10 s12">
                                    <input onchange="passValidation();" name="pass2" id="pass2" type="password" required>
                                    <label for="pass2">Masukan ulang password anda</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col l12 s12 m12">
                                    <div class="btn blue">
                                        <span>File</span>
                                        <input type="file" name="myfile">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload foto profil">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field right">
                                    <input type="submit" class="btn blue" value="Kirim">
                            </div>
                        </form>

                    </div>
                </div>    
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.datepicker').pickadate({
                    selectMonths: true,
                    selectYears: 100,
                });
                
                $("#no-telp").keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
            });

            function passValidation(){
                var pass1 = document.getElementById("pass1");
                var pass2 = document.getElementById("pass2");

                if(pass1.value != pass2.value){
                    alert("Password anda berbeda");

                    pass1.value = "";
                    pass2.value = "";
                }
            }
        </script>

    </body>
</html>