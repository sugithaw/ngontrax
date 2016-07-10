<!DOCTYPE>
<?php
    $pagenow = "Detail Kamar";
    require '../model/mdl-kamar.php';
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
        
        <div id="load-animation">
            <div class="blue progress" style="top:9%">
                <div class="indeterminate"></div>
            </div>
        </div>
        
        <?php
            $id_kamar = $_GET['id_kamar'];
            $data_kamar = $model_kamar->getSingleData($id_kamar);
        ?>

        <div class="row">
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col l3 m12 s12">
                                    <div class="card-image">
                                        <img class="materialboxed" src="../../pics/bangunan/kos/<?php echo $data_kamar['foto'] ?>">
                                    </div>
                                </div>

                                <div class="col l9 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td><strong>No Kamar</strong></td>
                                            <td><?php echo $data_kamar['no_kamar'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><?php echo $data_kamar['harga'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Luas</td>
                                            <td><?php echo $data_kamar['luas'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="#!" class="btn blue" disabled>Buat tagihan</a>
                            <a href="#!" class="btn blue">Hubungkan Penghuni</a>
                        </div>
                    </div>
                </div>
            
                <div class="col col l8 m10 s12 offset-l2 offset-m1">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                        <div class="collapsible-header">Lihat Detail Kos</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td>No Kamar</td>
                                            <td><?php echo $data_kamar['no_kamar'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Luas</td>
                                            <td><?php echo $data_kamar['luas'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><?php echo $data_kamar['harga'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Air</td>
                                            <td><?php echo $data_kamar['air'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Listrik</td>
                                            <td><?php echo $data_kamar['listrik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><?php echo $data_kamar['keterangan'] ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="right">
                                        <a href="" class="btn blue">Lihat Video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                     </ul>
                 </div>
        
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title center">Tidak Ada Penghuni Saat Ini</div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>