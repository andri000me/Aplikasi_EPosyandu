<?php
    include '../connection.php';

    $func_ibu = $_GET['func_ibu'];

    if($func_ibu == "ambil_option_ibu"){
        $option_ibu = mysqli_query($conn, "SELECT nik_ibu FROM ref_ibu");
        $data = "<option>Pilih Nama Ibu</option>\n";
        while($func_ibu = mysqli_fetch_array($option_ibu)){
            $data.= "<option>".$func_ibu['nik_ibu']."</option>\n";
        }
        echo $data;
    
    } else if($func_ibu == "ambil_data_ibu"){
        $nik_ibu = $_GET['option_nik_ibu'];
        $data_ibu = mysqli_query($conn, "SELECT * FROM ref_ibu WHERE nik_ibu='$nik_ibu'");
        $d = mysqli_fetch_array($data_ibu);
        echo $d['nama_ibu']."|".$d['alamat_ibu']."|".$d['telp_ibu'];
    
    } else if($func_ibu == "update_data_ibu"){
        $nik_ibu = $_GET['option_nik_ibu'];
        $nama_ibu = htmlspecialchars($_GET['nama_ibu']);
        $alamat_ibu = htmlspecialchars($_GET['alamat_ibu']);
        $telp_ibu = htmlspecialchars($_GET['telp_ibu']);
        $update = mysqli_query($conn, "UPDATE ref_ibu SET nama_ibu='$nama_ibu', alamat_ibu='$alamat_ibu', 
                                            telp_ibu='$telp_ibu' WHERE nik_ibu='$nik_ibu'");
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_ibu == "del_data_ibu"){
        $nik_ibu = $_GET['option_nik_ibu'];
        $del = mysqli_query($conn, "DELETE FROM ref_ibu WHERE nik_ibu='$nik_ibu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($func_ibu == "tambah_data_ibu"){   
        $nik_ibu = $_GET['nik_ibu'];
        $nama_ibu = htmlspecialchars($_GET['nama_ibu']);
        $alamat_ibu = htmlspecialchars($_GET['alamat_ibu']);
        $telp_ibu = htmlspecialchars($_GET['telp_ibu']);
        $tambah = mysqli_query($conn, "INSERT INTO ref_ibu(id_ibu, nama_ibu, nik_ibu, alamat_ibu, telp_ibu) 
                                        VALUES('', '$nama_ibu','$nik_ibu','$alamat_ibu','$telp_ibu')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>