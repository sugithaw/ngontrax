<?php
    class model_non_kos{
        
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
	            $data[$index]['id_kontrakan'] = $rsData['id_kontrakan'];
	            $data[$index]['nama_kontrakan'] = $rsData['nama_kontrakan'];
	            $data[$index]['luas'] = $rsData['luas'];
	            $data[$index]['jumlah_lantai'] = $rsData['jumlah_lantai'];
	            $data[$index]['harga'] = $rsData['harga'];
	            $data[$index]['air'] = $rsData['air'];
	            $data[$index]['listrik'] = $rsData['listrik'];
	            $data[$index]['kategori'] = $rsData['id_kategori'];
	            //$data[$index]['prov'] = $rsData['prov'];
	            $data[$index]['kota'] = $rsData['id_kota'];
	            $data[$index]['alamat'] = $rsData['alamat'];
	            $data[$index]['deskripsi'] = $rsData['deskripsi'];
	            $data[$index]['video'] = $rsData['video'];
	            $data[$index]['foto'] = $rsData['foto'];
	            $data[$index]['x'] = $rsData['x'];
	            $data[$index]['y'] = $rsData['y'];

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
	            $data['id_kontrakan'] = $rsData['id_kontrakan'];
	            $data['nama_kontrakan'] = $rsData['nama_kontrakan'];
	            $data['luas'] = $rsData['luas'];
	            $data['jumlah_lantai'] = $rsData['jumlah_lantai'];
	            $data['harga'] = $rsData['harga'];
	            $data['air'] = $rsData['air'];
	            $data['listrik'] = $rsData['listrik'];
	            $data['kategori'] = $rsData['id_kategori'];
	            //$data[$index]['prov'] = $rsData['prov'];
	            $data['kota'] = $rsData['id_kota'];
	            $data['alamat'] = $rsData['alamat'];
	            $data['deskripsi'] = $rsData['deskripsi'];
	            $data['video'] = $rsData['video'];
	            $data['foto'] = $rsData['foto'];
	            $data['x'] = $rsData['x'];
	            $data['y'] = $rsData['y'];

                $index++;
            }

            if(mysql_num_rows($query)>0){
                return $data;
            }
        }
        
        
    }

    //bagian ngeset-ngeset isi dari objectnya
    $model_non_kos = new model_non_kos(); // buat obj baru
    $model_non_kos->setTableIdentity("kontrakan","id_kontrakan");
    $model_non_kos->setConnection("../../setting/conn.php");
?>