<?php
    include 'connection.php';

    $op = $_GET['op'];

    if($op == "ambiloption"){
        $option = mysqli_query($conn, "SELECT nama_anak FROM ref_anak");
        echo "<option>Pilih Nama Anak</option>\n";
        
        while($op = mysqli_fetch_array($option)){
            echo "<option>".$op['nama_anak']."</option>\n";
        }
    
    } else if($op == "ambildata"){
        $nama_anak = $_GET['nama_anak'];
        $data = mysqli_query($conn, "SELECT * FROM ref_anak WHERE nama_anak='$nama_anak'");
        $d = mysqli_fetch_array($data);
        echo $d['nik_anak']."|".$d['tempat_lahir_anak']."|".$d['tanggal_lahir_anak']. "|".$d['usia']. "|". $d['jk_anak'];
    
    } else if($op == "update"){
        $nama_anak = $_GET['nama_anak'];
        $nik_anak = htmlspecialchars($_GET['nik_anak']);
        $tempat_lahir_anak = htmlspecialchars($_GET['tempat_lahir_anak']);
        $tgl_lahir_anak = htmlspecialchars($_GET['tgl_lahir_anak']);
        $usia = htmlspecialchars($_GET['usia_anak']);
        $jk_anak = htmlspecialchars($_GET['jk_anak']);
        $update = mysqli_query($conn, "UPDATE ref_anak SET nik_anak='$nik_anak', tempat_lahir_anak='$tempat_lahir_anak', tanggal_lahir_anak='$tgl_lahir_anak', usia='$usia', jk_anak='$jk_anak' WHERE nama_anak='$nama_anak'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($op == "delete"){
        $nama_anak = $_GET['nama_anak'];
        $del = mysqli_query($conn, "DELETE FROM ref_anak WHERE nama_anak='$nama_anak'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($op == "tambah"){   
        $nama_anak2 = $_GET['nama_anak2'];
        $nik_anak = htmlspecialchars($_GET['nik_anak']);
        $tempat_lahir_anak = htmlspecialchars($_GET['tempat_lahir_anak']);
        $tgl_lahir_anak = htmlspecialchars($_GET['tgl_lahir_anak']);
        $usia_anak = htmlspecialchars($_GET['usia_anak']);
        $jk_anak = htmlspecialchars($_GET['jk_anak']);  
        $tambah = mysqli_query($conn, "INSERT INTO ref_anak(id_anak, nama_anak, nik_anak, tempat_lahir_anak, tanggal_lahir_anak, usia, jk_anak) 
                                    VALUES('', '$nama_anak2','$nik_anak','$tempat_lahir_anak','$tgl_lahir_anak', '$usia_anak', '$jk_anak')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>