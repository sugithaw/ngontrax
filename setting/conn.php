<?php
    $db = 'ngontrax';
    $dbserver = 'localhost';
    $dbuserServer = 'root';
    $dbpassword = '';

    $dbconn = mysql_connect($dbserver,$dbuserServer,$dbpassword);

    mysql_select_db($db,$dbconn) or die ("Koneksi ke database gagal");
?>