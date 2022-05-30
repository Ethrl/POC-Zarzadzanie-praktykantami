<?php

    if(isset($_POST["submitlogin"])){

        //pozyskiwanie danych
        $email = $_POST["email"];
        $haslo = $_POST["haslo"];


        //inicjowanie klas
        include "../model/bdhModel.php";
        include "../model/loginModel.php";
        include "../controller/loginController.php";
        $login = new loginController($email, $haslo);

        //errory
        $login->zalogujUzytkownika();

        //powrot do glownej strony
        header("location: ../public/indexlogowanie.php?error=0");
    }