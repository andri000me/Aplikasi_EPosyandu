<?php
    include 'connection.php';

    $func_posyandu = $_GET['func_posyandu'];

    if ($func_posyandu == "ambil_option_posyandu"){
        $option = mysqli_query($conn, "SELECT nama_posyandu FROM ref_posyandu");
        echo "<option>Pilih Nama Posyandu</option>\n";
        while($func_posyandu = mysqli_fetch_array($option)){
            echo "<option>".$func_posyandu['nama_posyandu']."</option>\n";
        }
    
    }else if($func_posyandu == "ambil_data_posyandu"){
        $option_nama_posyandu = $_GET['option_nama_posyandu'];
        $data = mysqli_query($conn, "SELECT * FROM ref_posyandu WHERE nama_posyandu='$option_nama_posyandu'");
        $d = mysqli_fetch_array($data);
        echo $d['alamat_posyandu']."|".$d['kel_posyandu']."|".$d['kec_posyandu']. "|".$d['kota_kab_posyandu'];
    
    } else if($func_posyandu == "update_data_posyandu"){
        $option_nama_posyandu = $_GET['option_nama_posyandu'];
        $alamat_posyandu = htmlspecialchars($_GET['alamat_posyandu']);
        $kel_posyandu = htmlspecialchars($_GET['kel_posyandu']);
        $kec_posyandu = htmlspecialchars($_GET['kec_posyandu']);
        $kota_kab_posyandu = htmlspecialchars($_GET['kota_kab_posyandu']);
        $update = mysqli_query($conn, "UPDATE ref_posyandu SET alamat_posyandu='$alamat_posyandu', kel_posyandu='$kel_posyandu', kec_posyandu='$kec_posyandu', kota_kab_posyandu='$kota_kab_posyandu' WHERE nama_posyandu='$option_nama_posyandu'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
    
    } else if($func_posyandu == "del_data_posyandu"){
        $option_nama_posyandu = $_GET['option_nama_posyandu'];
        $del = mysqli_query($conn, "DELETE FROM ref_posyandu WHERE nama_posyandu='$option_nama_posyandu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   }
?>