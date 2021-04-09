<?php
		
class Imunisasi  {
		private $conn;
		private $table_nama = "ref_vaksin";

		private $id_vaksin;
		private $nama_vaksin;
		

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