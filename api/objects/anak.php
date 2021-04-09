<?php
		
class Anak  {
		private $conn;
		private $table_nama = "ref_anak";

		private $id_anak;
		private $nama_anak;
		private $nik_anak;
		private $tempat_lahir_anak;
		private $tanggal_lahir_anak;
		private $usia;
		private $jk_anak;

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