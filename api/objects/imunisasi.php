<?php
		
class Imunisasi  {
		private $conn;
		private $table_nama = "ref_imunisasi";

		private $id_imunisasi;
		private $tanggal_imunisasi;
		private $usia_saat_vaksin;
		private $tinggi_badan;
		private $berat_badan;
		private $periode;

		public function __construct($db){
			$this->conn = $db;
		}
		public function read(){
	$query = "SELECT * FROM ".$this->table_nama;

	$stmt = $this->conn->prepare($query);
	$stmt->execute();

	return $stmt;
}


}
?>