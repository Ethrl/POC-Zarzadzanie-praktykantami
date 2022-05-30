<?php
    include "bdhModel.php";
    class edycja extends bdh{
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
    
        public function save($tabela, $pola = ''){
            $wklep = "INSERT INTO ".$tabela."(".implode(",",array_keys($pola)).")VALUES('".implode("','",array_values($fields))."')";
            $wynik = $this->connect()->query($wklep);
            if ($wynik) {
                return true;
            } else {
                return false;
            }
        }
        public function view($tabela){
            $stat = "SELECT * FROM ".$tabela." ";
            $wynik = $this->connect()->query($stat);
            $lista = array();
            while($dane = $wynik->fetch(PDO::FETCH_ASSOC)){
                $lista[] = $dane;
            }
            return $lista;
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

        public function update($tabela, $pola, $where){
            $query = "";
            $stat = "";
            foreach ($pola as $key => $value){
                $query .= $key." = '".$value."', ";
            }
            $query = substr($query, 0 , -2);
            foreach ($where as $key => $value){
                $stat .= $key." = '".$value."' AND ";
            }
            $stat = substr($stat, 0, -5);
            $sql = "UPDATE ".$tabela." SET ".$query." WHERE ".$stat." ";
            $wynik = $this->db->query($sql);
            if ($wynik){
                return true;
            } else{
                return false;
            }
        }

        public function delete($tabela, $where){
            $stat = "";
            foreach ($where as $key => $value) {
                $stat .= $key." = '".$value."' AND ";
            }
            $stat = substr($stat, 0, -5);
            $sql = "DELETE FROM ".$tabela." WHERE ".$stat." ";
            $wynik = $this->db->query($sql);
            if ($wynik) {
                return true;
            }else{
                return false;
            }
        }
    }