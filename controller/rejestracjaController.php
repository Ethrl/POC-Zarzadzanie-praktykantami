<?php

    class rejestracjaController extends Rejestracja{
        private $uid;
        private $email;
        private $haslo;
        private $powtorzHaslo;

        public function __construct($uid, $email, $haslo, $powtorzHaslo){
            $this->uid = $uid;
            $this->email = $email;
            $this->haslo = $haslo;
            $this->powtorzHaslo = $powtorzHaslo;
        }

        public function zarejestrujUzytkownika(){
            if($this->emptyInput() == false){
                echo "Pusty input!";
                header("location: ../public/indexrejestracja.php?error=pustyinput");
                exit();
            }
            if($this->zlyUid() == false){
                echo "Zla nazwa uzytkownika!";
                header("location: ../public/indexrejestracja.php?error=zleuid");
                exit();
            }
            if($this->zlyEmail() == false){
                echo "Zly email!";
                header("location: ../public/indexrejestracja.php?error=zlyemail");
                exit();
            }
            if($this->sprawdzHasla() == false){
                echo "Hasla się nie pokrywają!";
                header("location: ../public/indexrejestracja.php?error=zlehasla");
                exit();
            }
            if($this->sprawdzenieuidTaken() == false){
                echo "Nazwa użytkownika lub email są zajęte!";
                header("location: ../public/indexrejestracja.php?error=zajete");
                exit();
            }
            $this->utworzUzytkownika($this->uid, $this->email, $this->haslo);
        }

        private function emptyInput(){
            $wynik;
            if(empty($this->uid) || empty($this->email) || empty($this->haslo) || empty($this->powtorzHaslo)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }

        private function zlyUid(){
            $wynik;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }

        private function zlyEmail(){
            $wynik;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }

        private function sprawdzHasla(){
            $wynik;
            if($this->haslo !== $this->powtorzHaslo){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }

        private function sprawdzenieuidTaken(){
            $wynik;
            if(!$this->sprawdzUzytkownika($this->uid, $this->email)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }
    }