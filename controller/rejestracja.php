<?php

    if(isset($_POST["submitrejestracja"])){

        //pozyskiwanie danych
        $uid = $_POST["uid"];
        $email = $_POST["email"];
        $haslo = $_POST["haslo"];
        $powtorzHaslo = $_POST["powtorzHaslo"];


        //inicjowanie klas
        include "../model/bdhModel.php";
        include "../model/rejestracjaModel.php";
        include "../controller/rejestracjaController.php";
        $zarejestruj = new rejestracjaController($uid, $email, $haslo, $powtorzHaslo);

        //errory
        $zarejestruj->zarejestrujUzytkownika();

        //powrot do glownej strony
        header("location: ../public/indexlogowanie.php?error=0");
    }