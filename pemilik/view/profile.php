<!DOCTYPE>
<?php
    $pagenow = "Profil Saya";

    require ("../model/mdl-pemilik.php");
    
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
        
        <?php
            require '../model/mdl-kos.php';
            require '../model/mdl-non-kos.php';

            $id = $_SESSION['id_pemilik'];
            $data_kos = $model_kos->getData($id);
            $data_non_kos = $model_non_kos->getData($id);

        ?>

        <div id="load-animation"></div>
        <?php
            $id = $_SESSION['id_pemilik'];
            $data = $model_pemilik->getData($id);
        ?>
        
        <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col l3 m12 s12">
                                    <div class="card-image">
                                        <img class="materialboxed" src="../../pics/profile/pemilik/<?php echo $data[0]['foto'];?>" data-caption="<?php echo $data[0]['nama_depan']." ".$data[0]['nama_belakang']; ?>">
                                    </div>
                                </div>

                                <div class="col l9 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $id ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong><?php echo $data[0]['nama_depan']." ".$data[0]['nama_belakang']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kos</td>
                                            <td><?php echo count($data_kos);?></td>
                                        </tr>
                                        <tr>
                                            <td>Non Kos</td>
                                            <td><?php echo count($data_non_kos);?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="#!" class="btn-large blue waves-effect waves-light"><span><i class="material-icons left">mode_edit</i></span>Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">Detail Data Diri</div>
                            <div class="divider"></div>
                                    <table class="highlight">
                                        <tr>
                                            <td>No Identitas</td>
                                            <td><?php echo $id; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Depan</td>
                                            <td><?php echo $data[0]['nama_depan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Belakang</td>
                                            <td><?php echo $data[0]['nama_belakang']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $data[0]['jk']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Lahir</td>
                                            <td><?php echo $data[0]['tgl_lahir']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Telp</td>
                                            <td><?php echo $data[0]['no_telp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $data[0]['email']; ?></td>
                                        </tr>
                                        
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>