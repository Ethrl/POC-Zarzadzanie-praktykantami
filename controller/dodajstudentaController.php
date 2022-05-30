<?php

    class dodajstudentaController extends AddStudenta{
        public $imie;
        public $nazwisko;
        public $stanowisko;
        public $email;
        public $plec;
        public $hb;
        public $jezykprogramowania;
        public $zainteresowania;

        public function __construct($imie, $nazwisko, $stanowisko, $email, $plec, $hb, $jezykprogramowania, $zainteresowania){
            $this->imie = $imie;
            $this->nazwisko = $nazwisko;
            $this->stanowisko = $stanowisko;
            $this->email = $email;
            $this->plec = $plec;
            $this->hb = $hb;
            $this->jezykprogramowania = $jezykprogramowania;
            $this->zainteresowania = $zainteresowania;
        }

        public function dodajStudenta(){
            if($this->emptyInput() == false){
                echo "Pusty input!";
                exit();
            }
            if($this->zlyEmail() == false){
                echo "Zly email!";
                header("location: ../public/indexdodajstudenta.php?error=zlyemail");
                exit();
            }
            if($this->sprawdzenieuidTaken() == false){
                echo "Email zajety!";
                header("location: ../public/indexdodajstudenta.php?error=emailzajety");
                exit();
            }
            $this->utworzStudenta($this->imie, $this->nazwisko, $this->stanowisko, $this->email, $this->plec, $this->hb, $this->jezykprogramowania, $this->zainteresowania);
        }

        private function emptyInput(){
            $wynik;
            if(empty($this->imie)){
                $wynik = false;
                header("location: ../public/indexdodajstudenta.php?error=zleimie");
            }elseif(empty($this->nazwisko)){
                $wynik = false;
                header("location: ../public/indexdodajstudenta.php?error=zlenazwisko");
            }elseif(empty($this->email)){
                $wynik = false;
                header("location: ../public/indexdodajstudenta.php?error=zlyemail");
            }elseif(empty($this->plec)){
                $wynik = false;
                header("location: ../public/indexdodajstudenta.php?error=zleplec");
            }elseif(empty($this->hb)){
                $wynik = false;
                header("location: ../public/indexdodajstudenta.php?error=zlehobby");
            }else{
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
        private function sprawdzenieuidTaken(){
            $wynik;
            if(!$this->sprawdzStudenta($this->email)){
                $wynik = false;
            } else{
                $wynik = true;
            }
            return $wynik;
        }
    }