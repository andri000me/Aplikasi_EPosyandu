<?php
    include 'connection.php';

    $op = $_GET['op'];

    if isset()($op == "ambiloption"){
        $option = mysqli_query($conn, "SELECT nama_vaksin FROM ref_vaksin");
        echo "<option>Pilih Nama Vaksin</option>\n";
        while($op = mysqli_fetch_array($option)){
            echo "<option>".$op['nama_vaksin']."</option>\n";
        }
    
    } else if($op == "ambildata"){
        $nama_ibu = $_GET['nama_vaksin'];
        $data = mysqli_query($conn, "SELECT * FROM ref_vaksin WHERE nama_vaksin='$nama_vaksin'");
        $d = mysqli_fetch_array($data);
        echo $d['id_vaksin'];
    
    } else if($op == "update"){
        $id_ibu = $_GET['id_vaksin'];
        $nama_vaksin = htmlspecialchars($_GET['nama_ibu']);
        $update = mysqli_query($conn, "UPDATE ref_ibu SET nama_vaksin='$nama_ibu'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($op == "delete"){
        $nama_vaksin= $_GET['nama_vaksin'];
        $del = mysqli_query($conn, "DELETE FROM ref_vaksin WHERE nama_vaksin='$nama_vaksin'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($op == "tambah"){   
        $nama_vaksin2 = $_GET['nama_vaksin'];
        $tambah = mysqli_query($conn, "INSERT INTO ref_vaksin(id_nama, nama_vaksin) VALUES('', '$nama_vaksin2')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>