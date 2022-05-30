<?php
    include "bdhModel.php";
    class emailer extends bdh{
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $dbName = "Studencik";
        public $db;

        public function __construct(){
            $this->dbConnection();
        }
        
        public function dbConnection(){
            $this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
            if(!$this->db){
                print($this->db->num_error);
            }
        }
    
        
        public function selectWhere($tabela, $where = ''){
            $stat = "";
            $lista = array();
            foreach ($where as $key => $value) {
                $stat .= $key." = '".$value."' AND ";
                }
                $stat = substr($stat , 0, -5);
                $sql = "SELECT * FROM ".$tabela." WHERE ".$stat." ";
                $wynik = $this->db->query($sql);
                while($row = $wynik->fetch_array()){
                    $lista[] = $row;
                } 
                return $lista;
        }
    }