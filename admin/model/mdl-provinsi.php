<?php
    class model_provinsi{
        
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

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name",$dbconn);

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_provinsi'];
               $data[$index]['provinsi'] = ucwords($rsData['provinsi']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }

        function getSearchData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE $this->primary_key = '$val' OR provinsi LIKE '%$val%'",$dbconn);
            //perhatikan juga bagian di atas ini, isi field secondary (setelah blok "OR" ) untuk membantu pencarian  

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_provinsi'];
               $data[$index]['provinsi'] = ucwords($rsData['provinsi']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_prov = new model_provinsi(); // buat obj baru
    $model_prov->setTableIdentity("provinsi","id_provinsi ");
    $model_prov->setConnection("../../setting/conn.php");
?>