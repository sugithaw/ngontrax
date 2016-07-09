<?php
    require ("../../extra/date-converter.php");

    class controler{
        //buat vaemail
        var $table_email;
        var $primary_key;
        var $view_name;
        var $conn;

        //membuat bagian setter untuk identitas table
        function setTableIdentity($name,$pk){
            $this->table_name = $name;
            $this->primary_key = $pk;
        }
        
        //membuat setter untuk letak file connection
        function setConnection($value){
            $this->conn = $value;
        }
        
        //membuat setter letak view
        function setViewHeader($value){
            $this->view_name = $value;
        }
        
        function add(){
            require($this->conn);

            $date = new dateConverter();

            $nama_depan = $_POST['nama_depan'];
            $nama_belakang = $_POST['nama_belakang'];
            $no_identitas = $_POST['no_identitas'];
            $jk = $_POST['jk'];

            $tgl_lahir_temp = $_POST['tgl_lahir'];
            $tgl_lahir = $date->viewToDb($tgl_lahir_temp);

            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            $password = md5($_POST['pass2']);

            $pics = $_FILES['myfile']['name'];
    
            if($pics == ""){
                $pics_name = "default.jpg";
            } else {
                $uploadDir = "../../pics/profile/pemilik/";
                // Apabila ada file yang di-upload
                if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
                    $uploadFile = $_FILES['myfile'];

                    // Extract nama file
                    $extractFile = pathinfo($uploadFile['name']);
                    $size = $_FILES['myfile']['size']; //untuk mengetahui ukuran file
                    $tipe = $_FILES['myfile']['type'];// untuk mengetahui tipe file

                    //Dibawah ini adalah untuk mengatur format gambar yang dapat di upload ke server.
                    $pics_name = $no_identitas.'.'.$extractFile['extension'];

                    $exts =array('image/jpg','image/jpeg','image/pjpeg','image/png','image/x-png');
                    if(!in_array(($tipe),$exts)){
                        echo 'Format file yang di izinkan hanya JPEG dan PNG';
                        exit;
                    }
                }
            }

            /*echo "nd : ".$nama_depan."<br>";
            echo "nb : ".$nama_belakang."<br>";
            echo "nid : ".$no_identitas."<br>";
            echo "jk : ".$jk."<br>";
            echo "tl : ".$tgl_lahir."<br>";
            echo "nt : ".$no_telp."<br>";
            echo "em : ".$email."<br>";
            echo "pa : ".$pass."<br>";
            echo "pc : ".$pics_name."<br>";*/
            
            move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$no_identitas.'.'.$extractFile['extension']);

            $query = mysql_db_query($db,"INSERT INTO $this->table_name VALUES (NULL, '$no_identitas', '$nama_depan', '$nama_belakang', '$jk', '$tgl_lahir', '$no_telp', '$email', '$password', '$pics_name', '1')",$dbconn);

            if($query){
                //apabilsa query sukses maka akan di redirect ke sini
                header("location:../$this->view_name?st=1");
            }else{
                header("location:../$this->view_name?st=0");
            }
        }
    }



    //bagian ngeset-ngeset isi dari objectnya
    $controler = new controler(); // buat obj baru
    $controler->setTableIdentity("pemilik","id_pemilik");
    $controler->setConnection("../../setting/conn.php");
    $controler->setViewHeader("index.php");

    $command = $_GET['command'];

    //menentukan perintah
    if($command == 'add'){
        $controler->add();
    } elseif($command == 'delete'){
       $controler->delete();
    } elseif($command == 'edit'){
       $controler->edit();
    }
?>