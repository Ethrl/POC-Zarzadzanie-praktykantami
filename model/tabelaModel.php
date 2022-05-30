<?php
        include "../model/bdhModel.php";
        //pozyskiwanie danych z bazy
        $hostname = "localhost";
        $username = "root";  
        $password = "";
        $databasename = "Studencik";
        $conn = new mysqli($hostname, $username, $password, $databasename);
        $baza = $conn;

        function fetch_data($baza, $nazwaTabeli, $kolumny){
            if(empty($baza)){
                $msg = "Database connection error";
            }elseif (empty($kolumny) || !is_array($kolumny)) {
                $msg="Nazwy kolumn muszą być zdefiniowane w indexowanej tablicy.";
            }elseif(empty($nazwaTabeli)){
                $msg = "Nazwa tabeli jest pusta";
            }else{
                $nazwaKolumny = implode(', ', $kolumny);
                $stat = 'SELECT '.$nazwaKolumny.' FROM studenci ORDER BY student_id DESC';
                $query = $baza->query($stat);
                if($query == true){
                    if ($query->num_rows > 0){
                        $row=mysqli_fetch_all($query, MYSQLI_ASSOC);
                        $msg = $row;
                    }else{
                        $msg = "Brak danych.";
                }
                }else{
                    $msg = mysqli_error(connect());
                }
            }
            return $msg;
        }

        $nazwaTabeli = "studenci";
        $kolumny = ['student_imie','student_nazwisko','student_stanowisko','student_email','student_plec','student_hobby','student_jezykprogramowania','student_zainteresowania',];
        $fetch = fetch_data($baza, $nazwaTabeli, $kolumny);
