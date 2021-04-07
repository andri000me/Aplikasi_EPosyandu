<?php
    include '../connection.php';

    $func_anak = $_GET['func_anak'];

    if($func_anak == "ambil_option_anak"){
        $option = mysqli_query($conn, "SELECT * FROM ref_anak");
        echo "<option>Pilih NIK Anak</option>\n";
        
        while($func_anak = mysqli_fetch_array($option)){
            echo '<option value="'.$func_anak['nik_anak'].'">'.$func_anak['nama_anak'].'</option>\n';
        }
    
    } else if($func_anak == "ambil_data_anak"){
        $nik_anak = $_GET['option_nik_anak'];
        $data = mysqli_query($conn, "SELECT * FROM ref_anak WHERE nik_anak='$nik_anak'");
        $d = mysqli_fetch_array($data);
        echo $d['nama_anak']."|".$d['tempat_lahir_anak']."|".$d['tanggal_lahir_anak']. "|".$d['usia']. "|". $d['jk_anak'];
    
    } else if($func_anak == "update_data_anak"){
        $nik_anak = $_GET['option_nik_anak'];
        $nama_anak = htmlspecialchars($_GET['nama_anak']);
        $tempat_lahir_anak = htmlspecialchars($_GET['temp_lahir_anak']);
        $tgl_lahir_anak = htmlspecialchars($_GET['tgl_lahir_anak']);
        $usia_anak = htmlspecialchars($_GET['usia_anak']);
        $jk_anak = htmlspecialchars($_GET['jk_anak']);
        $update = mysqli_query($conn, "UPDATE ref_anak SET nama_anak='$nama_anak', tempat_lahir_anak='$tempat_lahir_anak', tanggal_lahir_anak='$tgl_lahir_anak', usia='$usia_anak', jk_anak='$jk_anak' WHERE nik_anak='$nik_anak'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_anak == "del_data_anak"){
        $nik_anak = $_GET['option_nik_anak'];
        $del = mysqli_query($conn, "DELETE FROM ref_anak WHERE nik_anak='$nik_anak'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($func_anak == "tambah_data_anak"){   
        $nik_anak = $_GET['nik_anak'];
        $nama_anak = htmlspecialchars($_GET['nama_anak']);
        $tempat_lahir_anak = htmlspecialchars($_GET['temp_lahir_anak']);
        $tgl_lahir_anak = htmlspecialchars($_GET['tgl_lahir_anak']);
        $usia_anak = htmlspecialchars($_GET['usia_anak']);
        $jk_anak = htmlspecialchars($_GET['jk_anak']);  
        $tambah = mysqli_query($conn, "INSERT INTO ref_anak(id_anak, nama_anak, nik_anak, tempat_lahir_anak, tanggal_lahir_anak, usia, jk_anak) 
                                    VALUES('', '$nama_anak','$nik_anak','$tempat_lahir_anak','$tgl_lahir_anak', '$usia_anak', '$jk_anak')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>