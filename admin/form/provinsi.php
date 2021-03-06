<!DOCTYPE>
<?php
    if(isset($_GET['edit'])){
        require("../model/mdl-provinsi.php");
        
        $editMode = true;
        $pagenow = "Edit provinsi";
        
        $id = $_GET['id'];
        
        $data = $model_prov->getSearchData($id);
        
        $value_only = $data[0]['provinsi'];
        
        $command = "edit";
    } else {
        $editMode = false;
        
        $pagenow = "Tambah provinsi";
        
        $command = "add";
    }
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
                            <form action="../controler/ctrl-provinsi.php?command=<?php echo $command ?>" method="post"> <!-- pastikan form action bener -->
                                <div class="input-field">
                                    <?php 
                                        if($editMode){
                                            echo "<input type='text' name='val' id='provinsi' value='$value_only' required>";
                                            echo "<input type='hidden' name='id' id='provinsi' value='$id'>";
                                        } else {
                                            echo "<input type='text' name='val' id='provinsi' required>";
                                        }
                                    ?>
                                    <label for="provinsi">Nama provinsi</label>
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
        
    </body>
</html>