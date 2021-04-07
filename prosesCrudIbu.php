<?php
    include 'connection.php';

    $op = $_GET['op'];

    if($op == "ambiloption"){
        $option = mysqli_query($conn, "SELECT nama_ibu FROM ref_ibu");
        echo "<option>Pilih Nama Ibu</option>\n";
        while($op = mysqli_fetch_array($option)){
            echo "<option>".$op['nama_ibu']."</option>\n";
        }
    
    } else if($op == "ambildata"){
        $nama_ibu = $_GET['nama_ibu'];
        $data = mysqli_query($conn, "SELECT * FROM ref_ibu WHERE nama_ibu='$nama_ibu'");
        $d = mysqli_fetch_array($data);
        echo $d['nik_ibu']."|".$d['alamat_ibu']."|".$d['no_telp_ibu'];
    
    } else if($op == "update"){
        $nama_ibu = $_GET['nama_ibu'];
        $nik_ibu = htmlspecialchars($_GET['nik_ibu']);
        $alamat_ibu = htmlspecialchars($_GET['alamat_ibu']);
        $no_telp_ibu = htmlspecialchars($_GET['no_telp_ibu']);
        $update = mysqli_query($conn, "UPDATE ref_ibu SET nik_ibu='$nik_ibu', alamat_ibu='$alamat_ibu', 
                                            no_telp_ibu='$no_telp_ibu' WHERE nama_ibu='$nama_ibu'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($op == "delete"){
        $nama_ibu = $_GET['nama_ibu'];
        $del = mysqli_query($conn, "DELETE FROM ref_ibu WHERE nama_ibu='$nama_ibu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($op == "tambah"){   
        $nama_ibu2 = $_GET['nama_ibu2'];
        $nik_ibu = htmlspecialchars($_GET['nik_ibu']);
        $alamat_ibu = htmlspecialchars($_GET['alamat_ibu']);
        $no_telp_ibu = htmlspecialchars($_GET['no_telp_ibu']);
        $tambah = mysqli_query($conn, "INSERT INTO ref_ibu(id_ibu, nama_ibu, nik_ibu, alamat_ibu, no_telp_ibu) 
                                        VALUES('', '$nama_ibu2','$nik_ibu','$alamat_ibu','$no_telp_ibu')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>