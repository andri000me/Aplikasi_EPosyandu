<?php
    include 'connection.php';

    $op = $_GET['op'];

    if($op == "ambiloption"){
        $option = mysqli_query($conn, "SELECT tgl_imunisasi FROM ref_imunisasi");
        echo "<option>Pilih Tanggal Imunisasi</option>\n";
        while($op = mysqli_fetch_array($option)){
            echo "<option>".$op['tgl_imunisasi']."</option>\n";
        }
    
    } else if($op == "ambildata"){
        $tgl_imunisasi = $_GET['tgl_imunisasi'];
        $data = mysqli_query($conn, "SELECT * FROM ref_imunisasi WHERE tgl_imunisasi='$tgl_imunisasi'");
        $d = mysqli_fetch_array($data);
        echo $d['usia_saat_vaksin']."|".$d['tinggi_badan']."|".$d['berat_badan']. "|". $d['periode'];
    
    } else if($op == "update"){
        $tgl_imunisasi = $_GET['tgl_imunisasi'];
        $usia_saat_vaksin = htmlspecialchars($_GET['usia_saat_vaksin']);
        $tinggi_badan = htmlspecialchars($_GET['tinggi_badan']);
        $berat_badan = htmlspecialchars($_GET['berat_badan']);
        $periode = htmlspecialchars($_GET['periode']);

        // var_dump($jk_petugas);
        $update = mysqli_query($conn, "UPDATE ref_imunisasi SET tgl_imunisasi='$tgl_imunisasi', 
                                        usia_saat_vaksin='$usia_saat_vaksin', 
                                        tinggi_badan='$tinggi_badan', 
                                        berat_badan='$berat_badan',
                                        periode='$periode'
                                        WHERE tgl_imunisasi='$tgl_imunisasi'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($op == "delete"){
        $tgl_imunisasi = $_GET['tgl_imunisasi'];
        $del = mysqli_query($conn, "DELETE FROM ref_imunisasi WHERE tgl_imunisasi='$tgl_imunisasi'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }
   } else if($op == "tambah"){   
        $tgl_imunisasi2 = $_GET['tgl_imunisasi2'];
        $usia_saat_vaksin = htmlspecialchars($_GET['usia_saat_vaksin']);
        $tinggi_badan = htmlspecialchars($_GET['tinggi_badan']);
        $berat_badan = $_GET['berat$berat_badan'];
        $periode = htmlspecialchars($_GET['periode']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_imunisasi(id_imunisasi, tgl_imunisasi, usia_saat_vaksin, tinggi_badan, berat_badan, periode) 
                        VALUES('', '$tgl_imunisasi2','$usia_saat_vaksin','$tinggi_badan','$berat_badan', '$periode')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
    }
?>