<?php
    class Ibu{
        private $conn;
        private $table_name = "ref_ibu";

        public $id_ibu;
        public $nama_ibu;
        public $nik_ibu;
        public $alamat_ibu;
        public $no_telp_ibu;

        public function __construct($db){
            $this->conn = $db;
        }
    }
?>