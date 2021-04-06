<?php
    include 'connection.php';

    $op = $_GET['op'];

    if($op == "ambiloption"){
        $option = mysqli_query($conn, "SELECT nama_petugas FROM ref_petugas");
        echo "<option>Pilih Nama Petugas</option>\n";
        while($op = mysqli_fetch_array($option)){
            echo "<option>".$op['nama_petugas']."</option>\n";
        }
    
    } else if($op == "ambildata"){
        $nama_petugas = $_GET['nama_petugas'];
        $data = mysqli_query($conn, "SELECT * FROM ref_petugas WHERE nama_petugas='$nama_petugas'");
        $d = mysqli_fetch_array($data);
        echo $d['jabatan_petugas']."|".$d['jk_petugas']."|".$d['tempat_lahir_petugas']. "|". $d['tgl_lahir_petugas'].
            "|". $d['alamat_petugas']. "|". $d['no_telp_petugas']. "|". $d['status_petugas'];
    
    } else if($op == "update"){
        $nama_petugas = $_GET['nama_petugas'];
        $jabatan_petugas = htmlspecialchars($_GET['jabatan_petugas']);
        $jk_petugas = htmlspecialchars($_GET['jk_petugas']);
        $tempat_lahir_petugas = htmlspecialchars($_GET['tempat_lahir_petugas']);
        $tgl_lahir_petugas = $_GET['tgl_lahir_petugas'];
        $alamat_petugas = htmlspecialchars($_GET['alamat_petugas']);
        $no_telp_petugas = htmlspecialchars($_GET['no_telp_petugas']);
        $status_petugas = htmlspecialchars($_GET['status_petugas']);

        // var_dump($jk_petugas);
        $update = mysqli_query($conn, "UPDATE ref_petugas SET jabatan_petugas='$jabatan_petugas', 
                                                            jk_petugas='$jk_petugas', 
                                                            tempat_lahir_petugas='$tempat_lahir_petugas', 
                                                            tgl_lahir_petugas='$tgl_lahir_petugas',
                                                            alamat_petugas='$alamat_petugas',
                                                            no_telp_petugas='$no_telp_petugas',
                                                            status_petugas='$status_petugas' WHERE nama_petugas='$nama_petugas'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($op == "delete"){
        $nama_petugas = $_GET['nama_petugas'];
        $del = mysqli_query($conn, "DELETE FROM ref_petugas WHERE nama_petugas='$nama_petugas'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($op == "tambah"){
        $id_petugas=uniqid('petugas');    
        $nama_petugas2 = $_GET['nama_petugas2'];
        $jabatan_petugas = htmlspecialchars($_GET['jabatan_petugas']);
        $jk_petugas = htmlspecialchars($_GET['jk_petugas']);
        $tempat_lahir_petugas = htmlspecialchars($_GET['tempat_lahir_petugas']);
        $tgl_lahir_petugas = $_GET['tgl_lahir_petugas'];
        $alamat_petugas = htmlspecialchars($_GET['alamat_petugas']);
        $no_telp_petugas = htmlspecialchars($_GET['no_telp_petugas']);
        $status_petugas = htmlspecialchars($_GET['status_petugas']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_petugas(id_petugas, nama_petugas, jabatan_petugas, jk_petugas, tempat_lahir_petugas, tgl_lahir_petugas, alamat_petugas, no_telp_petugas, status_petugas) 
                        VALUES('$id_petugas', '$nama_petugas2','$jabatan_petugas','$jk_petugas','$tempat_lahir_petugas', '$tgl_lahir_petugas', '$alamat_petugas', '$no_telp_petugas', '$status_petugas')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>