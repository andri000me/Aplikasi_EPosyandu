<?php
    include 'connection.php';

    $op = $_GET['op'];

    
    if($op == "ambildata"){
        $nama_posyandu = $_GET['nama_posyandu'];
        $data = mysqli_query($conn, "SELECT * FROM ref_anak WHERE nama_posyandu='$nama_posyandu'");
        $d = mysqli_fetch_array($data);
        echo $d['alamat_posyandu']."|".$d['kel_posyandu']."|".$d['tanggal_lahir_anak']. "|".$d['kota_kab_posyandu']. "|". $d['jk_anak'];
    
    } else if($op == "update"){
        $nama_posyandu = $_GET['nama_posyandu'];
        $alamat_posyandu = htmlspecialchars($_GET['alamat_posyandu']);
        $kel_posyandu = htmlspecialchars($_GET['kel_posyandu']);
        $kec_posyandu = htmlspecialchars($_GET['kec_posyandu']);
        $kota_kab_posyandu = htmlspecialchars($_GET['kota_kab_posyandu']);
        $update = mysqli_query($conn, "UPDATE ref_anak SET alamat_posyandu='$alamat_posyandu', kel_posyandu='$kel_posyandu', tanggal_lahir_anak='$kec_posyandu', kota_kab_posyandu='$kota_kab_posyandu', jk_anak='$jk_anak' WHERE nama_posyandu='$nama_posyandu'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
    
    } else if ($op == "tambah"){
        

    } else if($op == "delete"){
        $nama_posyandu = $_GET['nama_posyandu'];
        $del = mysqli_query($conn, "DELETE FROM ref_posyandu WHERE nama_posyandu='$nama_posyandu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   }
?>