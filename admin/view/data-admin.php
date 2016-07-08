<!DOCTYPE>
<?php
    $pagenow = "Data Admin";

    include("../model/mdl-admin.php");

    if(isset($_POST['search_value'])){
        $value = $_POST['search_value'];
        $data = $model_admin->getSearchData($value);
    } else {
        $data = $model_admin->getData();
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
                                    <label for="agama">Cari disini</label>
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
                                        <th>Nama</th>
                                        <th class="hide-on-small-only">JK</th>
                                        <th class="hide-on-med-and-down">Telp</th>
                                        <th class="hide-on-med-and-down">Email</th>
                                        <th class="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($data); $i++){ ?>
                                    <tr>
                                        <td><?php echo ($i+1) ?></td>
                                        <td><?php echo $data[$i]['nama'] ?></td>
                                        <td class="hide-on-small-only"><?php echo $data[$i]['jk'] ?></td>
                                        <td class="hide-on-med-and-down"><?php echo $data[$i]['no_telp'] ?></td>
                                        <td class="hide-on-med-and-down"><?php echo $data[$i]['email'] ?></td>
                                        <td class="center">
                                            <a onclick="value='<?php echo $data[$i]['agama'] ?>'; changeValue(<?php echo $data[$i]['id'] ?>)" class="waves-effect waves-light modal-trigger" href="#modal-hapus">
                                                <i class="material-icons red-text">delete</i>
                                            </a>
                                            <a href="../form/agama.php?edit=true&id=<?php echo $data[$i]['id'] ?>" class="waves-effect waves-light"><i class="material-icons">mode_edit</i></a> <!-- pastikan tujuan link bener yaa -->
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
            <a href="../form/agama.php" class="btn-floating btn-large blue"><i class="large material-icons"><i class="material-icons">add</i></i></a> <!-- pastikan link ini bener -->
        </div>
        
        
        <!-- tempat modal -->
        <div id="modal-hapus" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Hapus Data</h4>
                <p>Yakin ingin menghapus agama <strong id="text"></strong></p>
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
                document.getElementById("linkDelete").href="../controler/ctrl-agama.php?id="+id+"&command=delete"; // pastikan tujuan controler udah bener
            }
        </script>
    </body>
</html>