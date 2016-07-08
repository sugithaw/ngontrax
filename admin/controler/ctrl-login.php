<?php
    session_start();
    require_once("../../setting/conn.php");

    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysql_db_query($db,"SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."'",$dbconn);

    if(mysql_num_rows($query)>0){
        $rsData = mysql_fetch_array($query);
        $_SESSION['user'] = $rsData['nama_depan'];
        $_SESSION['id_admin'] = $rsData['1'];
        header("location:../view/dashboard.php");
    }else{
        header("location:../index.php");
    }
?>