<!DOCTYPE>
<?php
    $pagenow = "Asset Saya";
?>

<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.js"></script>
        
        
        <script type="text/javascript" src="../../js/jquery.smoothState.js"></script>
        <script type="text/javascript" src="../../js/main.js"></script>
        <link type="text/css" rel="stylesheet" href="../../css/keyframes.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../../css/pageTransitions.css"  media="screen,projection"/>
    </head>
    <body>
        <?php include "../inc/header.php" ?>
        
        <div id="load-animation"></div>
        
        <div class="row">
            <div class="col l8 m10 s12 offset-l2 offset-m1">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">Info</div>
                        <div class="divider"></div><br>
                        <p>Anda saat ini memiliki :</p>
                        <ul>
                            <li>2 Bangunan Kos</li>
                            <li>1 Villa</li>
                            <li>2 Guest House</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col l8 m10 s12 offset-l2 offset-m1">
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">business</i>Data Kos</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="highlight">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jml Kamar</th>
                                                <th class="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="truncate" style="max-width:100px"><a href="">Kos Indah Selamanya</a></td>
                                                <td>10</td>
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
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">home</i>Data Non Kos</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="highlight">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jml Kamar</th>
                                                <th class="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="truncate" style="max-width:100px"><a href="">Kos Indah Selamanya</a></td>
                                                <td>10</td>
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
                    </li>
                </ul>

            </div>
        </div>

        <div class="fixed-action-btn" style="bottom: 20px; right: 20px;">
            <a href="#modal-tambah" class="btn-floating btn-large blue waves-effect waves-light modal-trigger"><i class="large material-icons"><i class="material-icons">add</i></i></a> <!-- pastikan link ini bener -->
        </div>

        <div id="modal-tambah" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Tambah</h4>
                <p>Aset apa yang anda ingin tambahkan ?</p>
            </div>
            <div class="modal-footer">
                <a href="../form/rumah-kos.php" class="btn-large blue left waves-effect waves-light">Kos</a>
                <a href="#!" class="btn-large blue right waves-effect waves-light">Non Kos</a>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.collapsible').collapsible({
                    accordion : false
                });
            });

            $(document).ready(function(){
                $('.modal-trigger').leanModal();
            });
        </script>
    </body>
</html>