<?php

    class AddStudenta extends bdh{
        protected function utworzStudenta($imie, $nazwisko, $stanowisko, $email, $plec, $hb, $jezykprogramowania, $zainteresowania){
            $stat = $this->connect()->prepare('INSERT INTO studenci (student_imie, student_nazwisko, student_stanowisko, student_email, student_plec, student_hobby, student_jezykprogramowania, student_zainteresowania) VALUES (?, ?, ?, ?, ?, ? ,? ,?);');
            
            if(!$stat->execute(array($imie, $nazwisko, $stanowisko, $email, $plec, $hb, $jezykprogramowania, $zainteresowania))){
                $stat = null;
                echo "Statement failed.";
                header("location: ../public/indexdodajstudenta.php?error=stat1failed");
                exit();
            }
            $stat = null;
        }
        protected function sprawdzStudenta($email){
            $stat = $this->connect()->prepare('SELECT student_email FROM studenci WHERE student_email = ?;');
            if(!$stat->execute(array($email))){
                $stat = null;
                echo "Statement failed.";
                header("location: ../public/indexdodajstudenta.php?error=stat2failed");
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