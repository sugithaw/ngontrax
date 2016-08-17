<!DOCTYPE>
<?php
    $pagenow = "Detail Kos";

    require '../model/mdl-kos.php';
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
            $id_kos = $_GET['id_kos'];
            $data = $model_kos->getSingleData($id_kos);

            $data_kamar = $model_kamar->getData($id_kos);
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
                                        <img class="materialboxed" src="../../pics/bangunan/kos/<?php echo $data[0]['foto'];?>" data-caption="<?php echo $data[0]['nama_rumah_kos'] ?>">
                                    </div>
                                </div>

                                <div class="col l9 m12 s12">
                                    <table class="highlight">
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $data[0]['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong><?php echo $data[0]['nama_rumah_kos']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jml Kamar</td>
                                            <td><?php echo count($data_kamar); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Dihuni</td>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card-action right-align">
                            <a href="" class="btn-large blue waves-effect waves-light"><i class="material-icons left">mode_edit</i></a>
                            <a href="" class="btn-large blue waves-effect waves-light">Iklankan</a>
                        </div>
                    </div>
                </div>
                
                <div class="col col l8 m10 s12 offset-l2 offset-m1">
	                <ul class="collapsible" data-collapsible="accordion">
	                	<li>
                        <div class="collapsible-header blue white-text">Lihat Detail Kos</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="striped">
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $data[0]['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong><?php echo $data[0]['nama_rumah_kos']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Luas</td>
                                            <td><?php echo $data[0]['luas'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Lantai</td>
                                            <td><?php echo $data[0]['jumlah_lantai'] ?></td>
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

                 <div class="col col l8 m10 s12 offset-l2 offset-m1">
                	<div class="card">
                		<div class="card-content">
                			<div class="card-title">Data Kamar</div>
                			<div class="divider"></div>
                			<table class="striped">
                				<thead>
                					<tr>
                						<th>No</th>
                						<th>Nama</th>
                						<th class="center">Penghuni</th>
                						<th class="center">Aksi</th>
                					</tr>
                				</thead>
                				<tbody>
                					<?php for ($i=0; $i < count($data_kamar); $i++) { 
                                        $nama = $data[0]['nama_rumah_kos']."-".$data_kamar[$i]['no_kamar'];
                                    ?>
                                    <tr>
                						<td><?php echo ($i+1);?></td>
                						<td><a href="detail-kamar.php?id_kamar=<?php echo $data_kamar[$i]['id']; ?>"><?php echo $nama; ?></a></td>
                						<td class="center">Y</td>
                						<td class="center">
                                            <a href="" class="blue-text"><i class="material-icons">mode_edit</i></a>
                                            <a href="" class="red-text"><i class="material-icons">delete</i></a>
                                        </td>
                					</tr>
                                    <?php } ?>
                				</tbody>
                			</table>
                		</div>
                	</div>
                 </div>


            </div>

            <div class="fixed-action-btn" style="bottom: 20px; right: 20px;">
            	<a href="../form/kamar-kos.php?id_rumah=<?php echo $data[0]['id'] ?>" class="btn-floating btn-large blue waves-effect waves-light modal-trigger"><i class="large material-icons"><i class="material-icons">add</i></i></a> <!-- pastikan link ini bener -->
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
                $x = $data[0]['x'];
                $y = $data[0]['y'];
            ?>
            var myLatLng = {lat: <?php echo $y; ?>, lng: <?php echo $x; ?>};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '<?php echo $data[0]['nama_rumah_kos'] ?>'
            });
        }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwCRz59NQ-6mcCYNSZhe2i2XRGxTxbS7U&callback=initMap"></script>
    </body>
</html>