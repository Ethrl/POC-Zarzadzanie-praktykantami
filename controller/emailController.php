<?php

        use PHPMailer\PHPMailer\PHPMailer;
        function wyslijemail(){

            
        $name = "Studencik";  // Nazwa domeny
        $to = $_POST['email'];  // Email odbiorcy
        $subject = $_POST['temat'];
        $body = $_POST['wiadomosc'];
        //$from = "studencik@mail.com";  // email domeny
        //$password = "haslo";  // haslo emaila


        require_once "../vendor/autoload.php";
        $mail = new PHPMailer();


        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        //$mail->Username = $from;
        //$mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo "Email is sent!";
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }


        // sendmail();  // call this function when you want to
        if(isset($_POST["submitemail"])){
            wyslijemail();
        }
        
        //powrot do glownej strony
        header("location: ../public/indexwyslijemail.php?error=0");