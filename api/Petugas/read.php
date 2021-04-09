<?php
    //required header
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    //include database and ibu object
    include_once '../config/database.php';
    include_once '../objects/petugas.php';

    $func_petugas = $_GET['func_petugas'];

    if ($func_petugas == "ambil_data_petugas"){
        //Initialize Database
        $database = new Database();
        $db = $database->getConnection();

        $petugas = new Petugas($db);

        //Read Ibu
        $stmt = $petugas->read();
        $num = $stmt->rowCount();

        if ($num > 0){

            //Ibu array
            $petugas_arr = array();
            $petugas_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $petugas_item=array(
                    "id_petugas" => $id_petugas,
                    "nama_petugas" => $nama_petugas,
                    "jabatan_petugas" => $jabatan_petugas,
                    "jk_petugas" => $jk_petugas,
                    "tempat_lahir_petugas" => $tempat_lahir_petugas,
                    "tgl_lahir_petugas" => $tgl_lahir_petugas,
                    "alamat_petugas" => $alamat_petugas,
                    "no_telp_petugas" => $no_telp_petugas,
                    "status_petugas" => $status_petugas
                );

                array_push($petugas_arr["records"], $petugas_item);
            }

            http_response_code(200);

            echo json_encode($petugas_arr);

        } else {
            http_response_code(500);

            echo json_encode(
                array("message" => "500 Error")
            );
        }
    }
?>