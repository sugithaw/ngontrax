<?php
    class model_rumah_kos{
        
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
        
        function getData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE id_pemilik = $val",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_rumah_kos'];
               $data[$index]['nama_rumah_kos'] = ucwords($rsData['nama_rumah_kos']);
               $data[$index]['alamat'] = ucwords($rsData['alamat']);
               $data[$index]['luas'] = ucwords($rsData['luas']);
               $data[$index]['jumlah_lantai'] = ucwords($rsData['jumlah_lantai']);
               $data[$index]['deskripsi'] = ucwords($rsData['deskripsi']);
               $data[$index]['id_kota'] = $rsData['id_kota'];
               $data[$index]['x'] = $rsData['x'];
               $data[$index]['y'] = $rsData['y'];
               $data[$index]['foto'] = $rsData['foto'];
               $data[$index]['video'] = $rsData['video'];

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }

        function getSingleData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE $this->primary_key = $val",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_rumah_kos'];
               $data[$index]['nama_rumah_kos'] = ucwords($rsData['nama_rumah_kos']);
               $data[$index]['alamat'] = ucwords($rsData['alamat']);
               $data[$index]['luas'] = ucwords($rsData['luas']);
               $data[$index]['jumlah_lantai'] = ucwords($rsData['jumlah_lantai']);
               $data[$index]['deskripsi'] = ucwords($rsData['deskripsi']);
               $data[$index]['kota'] = $rsData['id_kota'];
               $data[$index]['x'] = $rsData['x'];
               $data[$index]['y'] = $rsData['y'];
               $data[$index]['foto'] = $rsData['foto'];
               $data[$index]['video'] = $rsData['video'];

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_kos = new model_rumah_kos(); // buat obj baru
    $model_kos->setTableIdentity("rumah_kos","id_rumah_kos ");
    $model_kos->setConnection("../../setting/conn.php");
?>