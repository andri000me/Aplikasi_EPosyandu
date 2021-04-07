<?php
    include '../connection.php';

    $func_petugas = $_GET['func_petugas'];

    if($func_petugas == "ambil_option_petugas"){
        $option = mysqli_query($conn, "SELECT nama_petugas FROM ref_petugas");
        var_dump($option);
        echo "<option>Pilih Nama Petugas</option>\n";
        while($func_petugas = mysqli_fetch_array($option)){
            echo "<option>".$func_petugas['nama_petugas']."</option>\n";
        }
    
    } else if($func_petugas == "ambil_data_petugas"){
        $option_nama_petugas = $_GET['option_nama_petugas'];
        $data = mysqli_query($conn, "SELECT * FROM ref_petugas WHERE nama_petugas='$option_nama_petugas'");
        $d = mysqli_fetch_array($data);
        echo $d['jabatan_petugas']."|".$d['jk_petugas']."|".$d['temp_lahir_petugas']. "|". $d['tgl_lahir_petugas'].
            "|". $d['alamat_petugas']. "|". $d['telp_petugas']. "|". $d['status_petugas'];
    
    } else if($func_petugas == "update_data_petugas"){
        $option_nama_petugas = $_GET['option_nama_petugas'];
        $jabatan_petugas = htmlspecialchars($_GET['jabatan_petugas']);
        $jk_petugas = htmlspecialchars($_GET['jk_petugas']);
        $temp_lahir_petugas = htmlspecialchars($_GET['temp_lahir_petugas']);
        $tgl_lahir_petugas = $_GET['tgl_lahir_petugas'];
        $alamat_petugas = htmlspecialchars($_GET['alamat_petugas']);
        $telp_petugas = htmlspecialchars($_GET['telp_petugas']);
        $status_petugas = htmlspecialchars($_GET['status_petugas']);

        // var_dump($jk_petugas);
        $update = mysqli_query($conn, "UPDATE ref_petugas SET jabatan_petugas='$jabatan_petugas', 
                                        jk_petugas='$jk_petugas', 
                                        temp_lahir_petugas='$temp_lahir_petugas', 
                                        tgl_lahir_petugas='$tgl_lahir_petugas',
                                        alamat_petugas='$alamat_petugas',
                                        telp_petugas='$telp_petugas',
                                        status_petugas='$status_petugas' 
                                        WHERE nama_petugas='$option_nama_petugas'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
    } else if($func_petugas == "del_data_petugas"){
        $option_nama_petugas = $_GET['option_nama_petugas'];
        $del = mysqli_query($conn, "DELETE FROM ref_petugas WHERE nama_petugas='$option_nama_petugas'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($func_petugas == "tambah_data_petugas"){   
        $nama_petugas = $_GET['nama_petugas'];
        $jabatan_petugas = htmlspecialchars($_GET['jabatan_petugas']);
        $jk_petugas = htmlspecialchars($_GET['jk_petugas']);
        $temp_lahir_petugas = htmlspecialchars($_GET['temp_lahir_petugas']);
        $tgl_lahir_petugas = $_GET['tgl_lahir_petugas'];
        $alamat_petugas = htmlspecialchars($_GET['alamat_petugas']);
        $telp_petugas = htmlspecialchars($_GET['telp_petugas']);
        $status_petugas = htmlspecialchars($_GET['status_petugas']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_petugas(id_petugas, nama_petugas, jabatan_petugas, jk_petugas, temp_lahir_petugas, tgl_lahir_petugas, alamat_petugas, telp_petugas, status_petugas) 
                        VALUES('', '$nama_petugas','$jabatan_petugas','$jk_petugas','$temp_lahir_petugas', '$tgl_lahir_petugas', '$alamat_petugas', '$telp_petugas', '$status_petugas')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>