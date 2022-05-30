<?php

    class Rejestracja extends bdh{
        protected function utworzUzytkownika($uid, $email, $haslo){
            $stat = $this->connect()->prepare('INSERT INTO uzytkownicy (uzytkownik_uid, uzytkownik_email, uzytkownik_haslo) VALUES (?, ?, ?);');
            $hashowanieHasla = password_hash($haslo, PASSWORD_DEFAULT);
            
            if(!$stat->execute(array($uid, $email, $hashowanieHasla))){
                $stat = null;
                echo "Statement failed.";
                header("location: ../public/index.php?error=statfailed");
                exit();
            }
            $stat = null;
        }
        protected function sprawdzUzytkownika($uid, $email){
            $stat = $this->connect()->prepare('SELECT uzytkownik_uid FROM uzytkownicy WHERE uzytkownik_uid = ? OR uzytkownik_email = ?;');
            if(!$stat->execute(array($uid, $email))){
                $stat = null;
                echo "Statement failed.";
                header("location: ../public/index.php?error=statfailed");
                exit();
            }
            $sprawdzWynik;
            if($stat->rowCount() > 0){
                $sprawdzWynik = false;
            } else{
                $sprawdzWynik = true;
            }
            return $sprawdzWynik;
        }

    }