<?php
    class model_admin{
        
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
                $data[$index]['id'] = $rsData['id_admin'];
                $data[$index]['nama'] = ucwords($rsData['nama_depan'])." ".ucwords($rsData['nama_belakang']);
                $data[$index]['jk'] = $rsData['jk'];
                $data[$index]['no_telp'] = $rsData['no_telp'];
                $data[$index]['email'] = $rsData['email'];
                
                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }

        function getSearchData($val){
            require($this->conn);

            $query = mysql_db_query($db,"SELECT * FROM $this->table_name WHERE $this->primary_key = '$val' OR admin LIKE '%$val%'",$dbconn);
            //perhatikan juga bagian di atas ini, isi field secondary (setelah blok "OR" ) untuk membantu pencarian  

            $index = 0;

            while($rsData = mysql_fetch_array($query)){
               $data[$index]['id'] = $rsData['id_admin'];
               $data[$index]['admin'] = ucwords($rsData['admin']);

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_admin = new model_admin(); // buat obj baru
    $model_admin->setTableIdentity("admin","id_admin");
    $model_admin->setConnection("../../setting/conn.php");
?>