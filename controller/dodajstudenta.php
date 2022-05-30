<?php

    if(isset($_POST["submitstudent"])){

        //pozyskiwanie danych
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $stanowisko = $_POST["stanowisko"];
        $email = $_POST["email"];
        $plec = $_POST["plec"];
        $hobby = $_POST["hobby"];
        $jezykprogramowania = $_POST["jezykprogramowania"];
        $zainteresowania = $_POST["zainteresowania"];

        $hb = "";

            foreach($hobby as $hb1){
                $hb .= $hb1.", ";
            }

        //inicjowanie klas
        include "../model/bdhModel.php";
        include "../model/dodajstudentaModel.php";
        include "../controller/dodajstudentaController.php";
        $dodajStudenta = new dodajstudentaController($imie, $nazwisko, $stanowisko, $email, $plec, $hb, $jezykprogramowania, $zainteresowania);

        //errory
        $dodajStudenta->dodajStudenta();

        //powrot do glownej strony
        header("location: ../public/indexdodajstudenta.php?error=0");
        echo "<script>alert('Pomyślnie dodano studenta.')</script>";
    }