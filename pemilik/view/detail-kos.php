<!DOCTYPE>
<?php
    $pagenow = "Detail Kos";

    require '../model/mdl-kos.php';
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
        
        <?php
            $id_kos = $_GET['id_kos'];
            $data = $model_kos->getSingleData($id_kos);
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
                                            <td>Kos</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>Non Kos</td>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card-action right-align">
                            <a href="#!" class="btn-large blue waves-effect waves-light"><span><i class="material-icons left">mode_edit</i></span>Edit Profil Kos</a>
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
	                                    <a href="" class="btn blue">Tampilkan Lokasi</a>
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
                			<div class="card-title">Data Kamar</div>
                			<div class="divider"></div>
                			<table>
                				<thead>
                					<tr>
                						<th>No</th>
                						<th>Nama</th>
                						<th class="center">Penghuni</th>
                						<th class="center">Aksi</th>
                					</tr>
                				</thead>
                				<tbody>
                					<tr>
                						<td>1</td>
                						<td>Nama-1</td>
                						<td class="center">Y</td>
                						<td class="center">
                                            <a href="" class="blue-text"><i class="material-icons">mode_edit</i></a>
                                            <a href="" class="red-text"><i class="material-icons">delete</i></a>
                                        </td>
                					</tr>
                				</tbody>
                			</table>
                		</div>
                	</div>
                 </div>


            </div>

            <div class="fixed-action-btn" style="bottom: 20px; right: 20px;">
            	<a href="#!" class="btn-floating btn-large blue waves-effect waves-light modal-trigger"><i class="large material-icons"><i class="material-icons">add</i></i></a> <!-- pastikan link ini bener -->
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
        </script>
    </body>
</html>