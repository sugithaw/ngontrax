<?php
    class model_kamar{
        
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

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE id_rumah_kos = $val",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_kamar'];
               $data[$index]['no_kamar'] = ucwords($rsData['no_kmr_kos']);
               $data[$index]['luas'] = $rsData['luas'];
               $data[$index]['harga'] = $rsData['harga'];
               $data[$index]['air'] = $rsData['air'];
               $data[$index]['listrik'] = $rsData['listrik'];
               $data[$index]['foto'] = $rsData['foto'];
               $data[$index]['video'] = $rsData['video'];
               $data[$index]['keterangan'] = $rsData['keterangan'];

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
               $data['id'] = $rsData['id_kamar'];
               $data['no_kamar'] = ucwords($rsData['no_kmr_kos']);
               $data['luas'] = $rsData['luas'];
               $data['harga'] = $rsData['harga'];
               $data['air'] = $rsData['air'];
               $data['listrik'] = $rsData['listrik'];
               $data['foto'] = $rsData['foto'];
               $data['video'] = $rsData['video'];
               $data['keterangan'] = $rsData['keterangan'];

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_kamar = new model_kamar(); // buat obj baru
    $model_kamar->setTableIdentity("kamar_kos","id_kamar");
    $model_kamar->setConnection("../../setting/conn.php");
?>