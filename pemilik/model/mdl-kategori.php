<?php
    class model_kategori{
        
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
               $data[$index]['id'] = $rsData['id_kategori'];
               $data[$index]['kategori'] = ucwords($rsData['kategori']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }

        function getSearchData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE $this->primary_key = '$val' OR kategori LIKE '%$val%'",$dbconn);
            //perhatikan juga bagian di atas ini, isi field secondary (setelah blok "OR" ) untuk membantu pencarian  

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_kategori'];
               $data[$index]['kategori'] = ucwords($rsData['kategori']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_kategori = new model_kategori(); // buat obj baru
    $model_kategori->setTableIdentity("kategori","id_kategori");
    $model_kategori->setConnection("../../setting/conn.php");
?>