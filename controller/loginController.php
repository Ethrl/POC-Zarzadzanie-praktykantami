<?php

    class loginController extends Logowanie{
        private $email;
        private $haslo;
        
        public function __construct($email, $haslo){
            $this->email = $email;
            $this->haslo = $haslo;
        }

        public function zalogujUzytkownika(){
            if($this->emptyInput() == false){
                echo "Pusty input!";
                header("location: ../public/indexlogowanie.php?error=pustyinput");
                exit();
            }
            $this->odbierzUzytkownika($this->email, $this->haslo);
        }

        private function emptyInput(){
            $wynik;
            if(empty($this->email) || empty($this->haslo)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }
    }