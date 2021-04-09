<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database
include_once '../config/database.php' ;
include_once '../objects/imunisasi.php';

//inistantiate database and product object
$database = new Database();
$db = $database->getConnection();

//initialize object
$imun = new Imunisasi($db);

//read product
//query products
$stmt = $imun->read();
$num = $stmt->rowCount();

//check if more than 0 record found
if($num>0){

	$imun_arr=array();
	$imun_arr["records"]=array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

	extract($row);

	$imun=array(
			"id_imunisasi"=>$id_imunisasi,
			"tgl_imunisasi"=>$tgl_imunisasi,
			"usia_saat_vaksin"=>$usia_saat_vaksin,
			"tinggi_badan"=>$tinggi_badan,
			"berat_badan"=>$berat_badan,
			"periode"=>$periode,
			
	);
	array_push($imun_arr["records"], $imun);
	}
	http_response_code(200);

	echo json_encode($imun_arr);

}
else{
	http_response_code(404);
	echo json_encode(
		array("message" => "404! Not Found ")
	);
}
?>