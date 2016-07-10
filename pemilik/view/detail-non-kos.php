<!DOCTYPE>
<?php
    $pagenow = "Detail Kontrakan";

    require '../model/mdl-non-kos.php';
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
            $id_kontrakan = $_GET['id_kontrakan'];
            $data = $model_non_kos->getSingleData($id_kontrakan);
        ?>

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
                            <div class="row">
                                <div class="col l3 m12 s12">
                                    <div class="card-image">
                                        <img class="materialboxed" src="../../pics/bangunan/non-kos/<?php echo $data[0]['foto'];?>">
                                    </div>
                                </div>

                                <div class="col l9 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $data['id_kontrakan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong><?php echo $data['nama_kontrakan']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><?php echo $data['harga'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="" class="btn-large blue waves-effect waves-light"><span><i class="material-icons left">mode_edit</i></span>Edit Profil Kontrakan</a>
                            <a href="" class="btn-large blue waves-effect waves-light">Hubungkan Penghuni</a>
                        </div>
                    </div>
                </div>
                
                <div class="col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title center">Tidak Ada Penghuni Saat Ini</div>
                        </div>
                    </div>
                </div>

                <div class="col col l8 m10 s12 offset-l2 offset-m1">
	                <ul class="collapsible" data-collapsible="accordion">
	                	<li>
                        <div class="collapsible-header">Lihat Detail Kontrakan</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $data['id_kontrakan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong><?php echo $data['nama_kontrakan']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Luas</td>
                                            <td><?php echo $data['luas'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Lantai</td>
                                            <td><?php echo $data['jumlah_lantai'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Air</td>
                                            <td><?php echo $data['air'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Listrik</td>
                                            <td><?php echo $data['listrik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>bali</td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kab</td>
                                            <td>Denpasar</td>
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

                 <div class="col col l8 m10 s12 offset-l2 offset-m1">
                    <div class="card">
                        <div class="card-content">
                            <div id="map" style="height:40%"></div>
                        </div>
                    </div>
                 </div>
            </div>

        <?php
            if(isset($_GET['st'])){
                $val = $_GET['st'];
                echo "<script>toastMessage($val);</script>";
            }
        ?>

        <script type="text/javascript">
        	$(document).ready(function(){
        		$('.collapsible').collapsible({
        			accordion : false
        		});
        	});

            var map;
        function initMap() {

            <?php
                $x = $data['x'];
                $y = $data['y'];
            ?>
            var myLatLng = {lat: <?php echo $y; ?>, lng: <?php echo $x; ?>};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '<?php echo $data['nama_kontrakan'] ?>'
            });
        }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwCRz59NQ-6mcCYNSZhe2i2XRGxTxbS7U&callback=initMap"></script>
    </body>
</html>