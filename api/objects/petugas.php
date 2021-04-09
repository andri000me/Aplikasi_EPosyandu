<?php
    class Petugas{
        private $conn;
        private $table_name = "ref_petugas";

        public $id_petugas;
        public $nama_petugas;
        public $jabatan_petugas;
        public $jk_petugas;
        public $tempat_lahir_petugas;
        public $tgl_lahir_petugas;
        public $alamat_petugas;
        public $no_telp_petugas;
        public $status_petugas;


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