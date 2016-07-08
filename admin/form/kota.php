<!DOCTYPE>
<?php
    if(isset($_GET['edit'])){
        require("../model/mdl-kota.php");
        
        $editMode = true;
        $pagenow = "Edit kota";
        
        $id = $_GET['id'];
        
        $data = $model->getSearchData($id);
        
        $value_only = $data[0]['kota'];
        $id_prov = $data[0]['id_provinsi'];
        
        $command = "edit";
    } else {
        $editMode = false;
        
        $pagenow = "Tambah kota";
        
        $command = "add";
    }

    require("../model/mdl-provinsi.php");

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
                            <form action="../controler/ctrl-kota.php?command=<?php echo $command ?>" method="post"> <!-- pastikan form action bener -->
                                <div class="row">
                                    <div class="input-field col l12">
                                        <select name="prov">
                                            
                                            <?php
                                                if($editMode){
                                                    for($i=0; $i<count($prov); $i++){
                                                        $data_prov_id = $prov[$i]['id'];
                                                        $prov_data = $prov[$i]['provinsi'];
                                                        
                                                        if($data_prov_id == $id_prov){
                                                            echo "<option selected value='$data_prov_id'>$prov_data</option>";
                                                        } else {
                                                            echo "<option value='$data_prov_id'>$prov_data</option>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<option selected>Pilih Provinsi</option>";
                                                    for($i=0; $i<count($prov); $i++){
                                                        $data_prov_id = $prov[$i]['id'];
                                                        $prov_data = $prov[$i]['provinsi'];
                                                        echo "<option value='$data_prov_id'>$prov_data</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <label>Provinsi</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l12">
                                        <?php 
                                            if($editMode){
                                                echo "<input type='text' name='val' id='kota' value='$value_only' required>";
                                                echo "<input type='hidden' name='id' id='kota' value='$id'>";
                                            } else {
                                                echo "<input type='text' name='kota' id='kota' required>";
                                            }
                                        ?>
                                        <label for="kota">Nama kota</label>
                                    </div>
                                </div>
                                <div class="input-field right-align">
                                    <button id="send" class="btn blue waves-effect waves-light">
                                        <i class="material-icons">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function() {
    $('select').material_select();
  });
        </script>
        
    </body>
</html>