<?php

    class controler{
        //buat vaiable
        var $table_name;
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
            session_start();
            $id_pemilik = $_SESSION['id_pemilik'];
            $nama = $_POST['nama'];
            $luas = $_POST['luas'];
            $jml_lantai = $_POST['jml_lantai'];
            $prov = $_POST['prov'];
            $kota = $_POST['kota'];
            $alamat = $_POST['alamat'];
            $deskripsi = $_POST['deskripsi'];
            $video = $_POST['video'];
            $x = $_POST['x'];
            $y = $_POST['y'];

            $pics = $_FILES['myfile']['name'];

            if($pics == ""){
                $pics_name = "default.jpg";
            } else {
                $uploadDir = "../../pics/bangunan/kos/";
                // Apabila ada file yang di-upload
                if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
                    $uploadFile = $_FILES['myfile'];

                    // Extract nama file
                    $extractFile = pathinfo($uploadFile['name']);
                    $size = $_FILES['myfile']['size']; //untuk mengetahui ukuran file
                    $tipe = $_FILES['myfile']['type'];// untuk mengetahui tipe file

                    //Dibawah ini adalah untuk mengatur format gambar yang dapat di upload ke server.
                    $pics_name = $id_pemilik.'-'.$nama.'.'.$extractFile['extension'];

                    $exts =array('image/jpg','image/jpeg','image/pjpeg','image/png','image/x-png');
                    if(!in_array(($tipe),$exts)){
                        echo 'Format file yang di izinkan hanya JPEG dan PNG';
                        exit;
                    }
                }
            }

            $foto = $pics_name;

            echo $id_pemilik;

            move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$id_pemilik.'-'.$nama.'.'.$extractFile['extension']);

            $str = "INSERT INTO $this->table_name VALUES (NULL, '$id_pemilik', '$nama', '$alamat', '$luas', '$jml_lantai', '$deskripsi', '$kota', '$x', '$y', '$foto', '$video')";
            $query = mysql_db_query($db,$str,$dbconn);

            if($query){
                //apabilsa query sukses maka akan di redirect ke sini
                header("location:../view/$this->view_name?st=1");
            }else{
                header("location:../view/$this->view_name?st=0");
            }
        }

        function delete(){
            require($this->conn);

            $id = $_GET['id'];

            $query = mysql_db_query($db,"DELETE FROM $this->table_name WHERE $this->primary_key = $id",$dbconn);

            if($query){
                //apabilsa query sukses maka akan di redirect ke sini
                header("location:../view/$this->view_name?st=1");
            }else{
                header("location:../view/$this->view_name?st=0");
            }
        }
        
        function edit(){
            require($this->conn);

            $id = $_POST['id']; // mengambiil id dari form yang di hiden
            $data = $_POST['val']; // mngambil data kategory yang di kirim dari form
            


            $query = mysql_db_query($db,"UPDATE $this->table_name SET rumah_kos = '$data' WHERE $this->primary_key = $id",$dbconn); 
            // perhatikan field yang di SET  di atas (karena di sini controler untuk kategory jadi field yang di set rumah_kos) harus di rubah di sini

            if($query){
                //apabilsa query sukses maka akan di redirect ke sini
                header("location:../view/$this->view_name?st=1");
            }else{
                header("location:../view/$this->view_name?st=0");
            }
        }
    }

    //bagian ngeset-ngeset isi dari objectnya
    $controler = new controler(); // buat obj baru
    $controler->setTableIdentity("rumah_kos","id_rumah_kos");
    $controler->setConnection("../../setting/conn.php");
    $controler->setViewHeader("asset.php");

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