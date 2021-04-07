<?php
    $conn = mysqli_connect("localhost", "root", "", "eposyandu");

    $func_imun = $_GET['func_imun'];
    
    if($func_imun == "ambil_data_imun"){
        $query = mysqli_query($conn, "SELECT * FROM ref_imunisasi");
        while ($d = mysqli_fetch_array($query)){
            echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
        }
    //}
//      else if($op == "update"){
//         $tgl_imunisasi = $_GET['tgl_imunisasi'];
//         $usia_saat_vaksin = htmlspecialchars($_GET['usia_saat_vaksin']);
//         $tinggi_badan = htmlspecialchars($_GET['tinggi_badan']);
//         $berat_badan = htmlspecialchars($_GET['berat_badan']);
//         $periode = htmlspecialchars($_GET['periode']);

//         // var_dump($jk_petugas);
//         $update = mysqli_query($conn, "UPDATE ref_imunisasi SET tgl_imunisasi='$tgl_imunisasi', 
//                                         usia_saat_vaksin='$usia_saat_vaksin', 
//                                         tinggi_badan='$tinggi_badan', 
//                                         berat_badan='$berat_badan',
//                                         periode='$periode'
//                                         WHERE tgl_imunisasi='$tgl_imunisasi'");
        
//         if($update){
//             echo "sukses";
//         } else {
//             echo "error";
//         }
   
    } else if($op == "delete"){
        $id_imun = $_GET['id_imun'];
        $del = mysqli_query($conn, "DELETE FROM ref_imunisasi WHERE id_imun='$id_imun'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_imun == "tambah_data_imun"){   
        $tgl_imunisasi = $_GET['tgl_imun'];
        $usia_saat_vaksin = htmlspecialchars($_GET['usia_saat_vaksin']);
        $tinggi_badan = htmlspecialchars($_GET['tinggi_badan']);
        $berat_badan = htmlspecialchars($_GET['berat_badan']);
        $periode = htmlspecialchars($_GET['periode']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_imunisasi(id_imunisasi, tgl_imunisasi, usia_saat_vaksin, tinggi_badan, berat_badan, periode) 
                        VALUES('', '$tgl_imunisasi','$usia_saat_vaksin','$tinggi_badan','$berat_badan', '$periode')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
   }
//     }
?>