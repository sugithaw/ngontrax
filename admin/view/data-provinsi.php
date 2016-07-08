<!DOCTYPE>
<?php
    $pagenow = "Data Provinsi";

    include("../model/mdl-provinsi.php");

    if(isset($_POST['search_value'])){
        $value = $_POST['search_value'];
        $data = $model_prov->getSearchData($value);
    } else {
        $data = $model_prov->getData();
    }
?>

<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.js"></script>
        
        <link rel="shortcut icon" href="../../css/favicon.ico">
    </head>
    <body>
        
        <?php include "../inc/header.php" ?>
        
        <div id="load-animation"></div>
      
        <div>
            
            <?php
            if(!$data){ 
            echo "
            <div class='row'>
                <div class='col l8 s12 m12 offset-l2'>
                    <div class='card'>
                        <div class='card-content'>
                            <h6>Data Kosong</h6>
                        </div>
                    </div>
                </div>
            </div>";
            };
            ?>
            <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <form method="post">
                                <div class="input-field">
                                    <input type='text' name='search_value'>
                                    <label for="provinsi">Cari disini</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <table>
                                <thead class="responsive-table">
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th class="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($data); $i++){ ?>
                                    <tr>
                                        <td><?php echo ($i+1) ?></td>
                                        <td><?php echo $data[$i]['provinsi'] ?></td>
                                        <td class="center">
                                            <a onclick="value='<?php echo $data[$i]['provinsi'] ?>'; changeValue(<?php echo $data[$i]['id'] ?>)" class="waves-effect waves-light modal-trigger" href="#modal-hapus">
                                                <i class="material-icons red-text">delete</i>
                                            </a>
                                            <a href="../form/provinsi.php?edit=true&id=<?php echo $data[$i]['id'] ?>" class="waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="fixed-action-btn" style="bottom: 20px; right: 20px;">
            <a href="../form/provinsi.php" class="btn-floating btn-large blue"><i class="large material-icons"><i class="material-icons">add</i></i></a>
        </div>
        
        
        <!-- tempat modal -->
        <div id="modal-hapus" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Hapus Data</h4>
                <p>Yakin ingin menghapus provinsi <strong id="text"></strong></p>
            </div>
            <div class="modal-footer">
                <a id="linkDelete" href="" class="btn red left">Iya</a>
                <button class="btn blue modal-action modal-close">Tidak</button>
            </div>
        </div>
        
        <?php
            if(isset($_GET['st'])){
                $val = $_GET['st'];
                echo "<script>toastMessage($val);</script>";
            }
        ?>
        
        <script>
            $(document).ready(function(){
                $('.modal-trigger').leanModal();
            });
            
            
            toastLoadedData(<?php echo count($data) ?>);
            
            
            var value;
            function changeValue(id){
                //alert(id);
                document.getElementById("text").innerHTML=value;
                document.getElementById("linkDelete").href="../controler/ctrl-provinsi.php?id="+id+"&command=delete";
            }
        </script>
    </body>
</html>