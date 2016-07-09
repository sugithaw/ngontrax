<?php
    session_start();
    require_once("../../setting/conn.php");

    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysql_db_query($db,"SELECT * FROM pemilik WHERE email = '".$email."' AND password = '".$password."'",$dbconn);

    if(mysql_num_rows($query)>0){
        $rsData = mysql_fetch_array($query);
        $_SESSION['user'] = $rsData['nama_belakang'];
        $_SESSION['id_admin'] = $rsData['id_pemilik'];
        header("location:../view/dashboard.php");
    }else{
        header("location:../index.php");
    }
?>