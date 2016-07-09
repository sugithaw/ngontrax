<?php
    require ("../../extra/date-converter.php");

    class model_pemilik{
        
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
        
        function getData($id){
            require($this->conn);
            $date = new dateConverter();

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE id_pemilik = $id",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
                $data[$index]['id'] = $rsData['id_pemilik'];
                $data[$index]['nama_depan'] = ucwords($rsData['nama_depan']);
                $data[$index]['nama_belakang'] = ucwords($rsData['nama_belakang']);

                if($rsData['jk'] == "L"){
                    $data[$index]['jk'] = "Laki - Laki";    
                } else {
                    $data[$index]['jk'] = "Perempuan";
                }

                $tgl_lahir_temp = $rsData['tgl_lahir'];
                $data[$index]['tgl_lahir'] = $date->dbToView($tgl_lahir_temp);

                $data[$index]['no_telp'] = $rsData['no_telp'];
                $data[$index]['email'] = $rsData['email'];
                $data[$index]['foto'] = $rsData['foto'];
                
                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_pemilik = new model_pemilik(); // buat obj baru
    $model_pemilik->setTableIdentity("pemilik","id_pemilik");
    $model_pemilik->setConnection("../../setting/conn.php");
?>