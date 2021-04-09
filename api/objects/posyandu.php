<?php
    class Posyandu{
        private $conn;
        private $table_name = "ref_posyandu";

        public $id_posyandu;
        public $nama_posyandu;
        public $alamat_posyandu;
        public $kel_posyandu;
        public $kec_posyandu;
        public $kota_kab_posyandu;

        public function __construct($db){
            $this->conn = $db;
        }

        function read(){
            $query = "SELECT * FROM " . $this->table_name;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }
?>