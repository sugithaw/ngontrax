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

            $data = $_POST['val'];

            $query = mysql_db_query($db,"INSERT INTO $this->table_name VALUES (NULL, '$data')",$dbconn);

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
            

            $query = mysql_db_query($db,"UPDATE $this->table_name SET kategori = '$data' WHERE $this->primary_key = $id",$dbconn); 
            // perhatikan field yang di SET  di atas (karena di sini controler untuk kategory jadi field yang di set kategori) harus di rubah di sini

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
    $controler->setTableIdentity("kategori","id_kategori");
    $controler->setConnection("../../setting/conn.php");
    $controler->setViewHeader("data-kategori.php");

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