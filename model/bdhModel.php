<?php

    class bdh{
        protected function connect(){
            try{
                $username = "root";
                $password = "";
                $bdh = new PDO('mysql:host=localhost;dbname=Studencik', $username, $password);
                return $bdh;
            } 
            catch(PDOExcepcion $err){
                print "Error: ".$err->getMessage()."<br/>";
                die();
            }
        }
    }