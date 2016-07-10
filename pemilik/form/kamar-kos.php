<!DOCTYPE>
<?php
    if(isset($_GET['edit'])){
        $editMode = true;
        $pagenow = "Edit Kamar Kos";
        $id = $_GET['id'];
        $command = "edit";
    } else {
        $editMode = false;
        $pagenow = "Edit Rumah Kos";
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

    </head>
    <body>    
        <?php include "../inc/header.php" ?>
        
        
        <div id="load-animation"></div>
      
        <div>
            <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <form action="../controler/ctrl-kamar.php?command=<?php echo $command; ?>" method="post" enctype="multipart/form-data"> <!-- pastikan form action bener -->
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <input type="hidden" name="id_rumah" id="id_rumah" value="<?php echo $_GET['id_rumah'] ?>">
                                        <input type="text" name="no_kamar" id="no_kamar" required>
                                        <label for="no_kamar">No Kamar</label>
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
                                        <input type="text" name="harga" id="harga" required>
                                        <label for="harga">Harga</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <select id="air" name="air">
                                            <option value="" disabled selected>Sumber Air</option>
                                            <option value="PAM">PAM</option>
                                            <option value="Sumur Gali">Sumur Gali</option>
                                            <option value="Sumur Bor">Sumur Bor</option>
                                            <option value="Lainya">Lainya</option>
                                        </select>
                                        <label>Provinsi</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l6 m12 s12">
                                        <input type="text" name="listrik">
                                        <label for="listrik">Listrik (Kwh)</label>
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
                                        <textarea class="materialize-textarea" name="keterangan" id="keterangan"></textarea>
                                        <label for="keterangan">Keterangan</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l12 m12 s12">
                                        <textarea class="materialize-textarea" name="video" id="Video"></textarea>
                                        <label for="Video">Link Video</label>
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

    </body>
</html>