<!DOCTYPE>
<?php
    if(isset($_GET['edit'])){
        $editMode = true;
        $pagenow = "Edit Rumah Kos";
        $id = $_GET['id'];
        $command = "edit";
    } else {
        $editMode = false;
        $pagenow = "Tambah Rumah Kos";
        $command = "add";
    }

    require '../model/mdl-kota.php';
    require '../model/mdl-prov.php';

    $kota = $model_kota->getData();
    $prov = $model_prov->getData();
?>

<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.js"></script>
        
        
    
        <style type="text/css">
            #deploy-map{
                height: 100%;
            }
        </style>

    </head>
    <body>    
        <?php include "../inc/header.php" ?>
        
        
        <div id="load-animation"></div>
      
        <div>
            <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <form action="#!" method="post"> <!-- pastikan form action bener -->
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <input type="text" name="nama" id="nama" required>
                                        <label for="nama">Nama</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l3 m4 s4">
                                        <input type="text" name="luas" id="luas" required>
                                        <label for="luas">Luas m2</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l3 m4 s4">
                                        <input type="text" name="jml_lantai" id="jml_lantai" required>
                                        <label for="jml_lantai">Jml Lantai</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <select id="prov" name="prov">
                                            <option value="" disabled selected>Pilih Provinsi</option>
                                            <?php
                                                for ($i=0; $i < count($prov) ; $i++) { 
                                                    echo "<option value='".$prov[$i]['id']."'>".$prov[$i]['provinsi']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <label>Provinsi</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <select>
                                            <option value="" disabled selected>Pilih Kota</option>
                                            <?php
                                                for ($i=0; $i < count($kota) ; $i++) { 
                                                    echo "<option value='".$kota[$i]['id']."'>".$kota[$i]['kota']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <label>Kota</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l12 m12 s12">
                                        <textarea class="materialize-textarea" name="alamat" id="alamat"></textarea>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l12 m12 s12">
                                        <textarea class="materialize-textarea" name="deskripsi" id="deskripsi"></textarea>
                                        <label for="deskripsi">Deskripsi</label>
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
                                    <div class="input-field col l12 m12 s12">
                                        <textarea class="materialize-textarea" name="Video" id="Video"></textarea>
                                        <label for="Video">Link Video</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col l12 m12 s12">
                                        <div id="map" style="height:50%"></div>
                                        <div>
                                            <p id="lat"></p>
                                            <p id="lng"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field right-align">
                                        <button id="send" class="btn blue waves-effect waves-light">
                                            <i class="material-icons">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select').material_select();
            });
        </script>

        <script type="text/javascript" src="../../js/map-google.js"></script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwCRz59NQ-6mcCYNSZhe2i2XRGxTxbS7U&callback=initMap"></script>


    </body>
</html>