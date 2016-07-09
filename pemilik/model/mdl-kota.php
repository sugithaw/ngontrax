<?php
    class model_kota{
        
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
        
        function getData(){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM view_kota",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_kota'];
               $data[$index]['id_provinsi'] = $rsData['id_provinsi'];
               $data[$index]['provinsi'] = ucwords($rsData['provinsi']);
               $data[$index]['kota'] = ucwords($rsData['kota']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }

        function getSearchData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM view_kota WHERE $this->primary_key = '$val' OR kota LIKE '%$val%' OR provinsi LIKE '%$val%'",$dbconn);
            //perhatikan juga bagian di atas ini, isi field secondary (setelah blok "OR" ) untuk membantu pencarian  

            $index = 0;

           while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_kota'];
               $data[$index]['id_provinsi'] = $rsData['id_provinsi'];
               $data[$index]['provinsi'] = ucwords($rsData['provinsi']);
               $data[$index]['kota'] = ucwords($rsData['kota']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_kota = new model_kota(); // buat obj baru
    $model_kota->setTableIdentity("kota","id_kota");
    $model_kota->setConnection("../../setting/conn.php");
?>