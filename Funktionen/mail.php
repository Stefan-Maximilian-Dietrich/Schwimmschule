<?php
	require("process.php");

  	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

function mail_hilfe()
{
		$username 		= read_TableAttributeById("custumer_data", "username", "username", $_SESSION["username"]);
		$anrede 		= read_TableAttributeById("custumer_data", "anrede", "username", $_SESSION["username"]); 
		$vorname 		= read_TableAttributeById("custumer_data", "vorname", "username", $_SESSION["username"]); 
		$nachname 		= read_TableAttributeById("custumer_data", "nachname", "username", $_SESSION["username"]); 
		$stasse 		= read_TableAttributeById("custumer_data", "strasse", "username", $_SESSION["username"]); 
		$hausnummer 	= read_TableAttributeById("custumer_data", "hausnummer", "username", $_SESSION["username"]); 
		$postleitzahl 	= read_TableAttributeById("custumer_data", "postleitzahl", "username", $_SESSION["username"]); 
		$ort 			= read_TableAttributeById("custumer_data", "ort", "username", $_SESSION["username"]); 
		$bundesland 	= read_TableAttributeById("custumer_data", "bundesland", "username", $_SESSION["username"]); 
		$festnetz 		= read_TableAttributeById("custumer_data", "festnetznummer", "username", $_SESSION["username"]); 
		$mobil1 		= read_TableAttributeById("custumer_data", "mobilnumer1", "username", $_SESSION["username"]); 
		$mobil2 		= read_TableAttributeById("custumer_data", "mobilnummer2", "username", $_SESSION["username"]); 
		$mail2 			= read_TableAttributeById("custumer_data", "mail", "username", $_SESSION["username"]);
		
		$name 				= read_TableAttributeById("students", "name", "customer_name", $_SESSION["username"]); 
		$geburtstag 		= read_TableAttributeById("students", "birth", "customer_name", $_SESSION["username"]); 
		$geburtsreihenvolge = read_TableAttributeById("students", "geborenes", "customer_name", $_SESSION["username"]); 
		$groesse 			= read_TableAttributeById("students", "groesse", "customer_name", $_SESSION["username"]); 
		$statur 			= read_TableAttributeById("students", "statur", "customer_name", $_SESSION["username"]); 
		$verhalten 			= read_TableAttributeById("students", "verhalten", "customer_name", $_SESSION["username"]); 
		$koerper 			= read_TableAttributeById("students", "koerper", "customer_name", $_SESSION["username"]); 
		$geist 				= read_TableAttributeById("students", "geist", "customer_name", $_SESSION["username"]); 
		$diabetis 			= read_TableAttributeById("students", "diabetis", "customer_name", $_SESSION["username"]); 
		$asthma 			= read_TableAttributeById("students", "asthma", "customer_name", $_SESSION["username"]); 
		$krankheiten 		= read_TableAttributeById("students", "chronisch", "customer_name", $_SESSION["username"]); 
		$altersklasse 		= read_TableAttributeById("students", "altersklasse", "customer_name", $_SESSION["username"]); 


		
		$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = 'smtp';
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "schwimmschule.dialog@gmail.com";
        $mail->Password = "tqjmfjeqkjvomwdp";

        $mail->setFrom("schwimmschule.dialog@gmail.com", "Schwimmschule ");
        $mail->addAddress("schwimmschule.allgaeu@gmail.com", "Alfred Hartmann");

        $mail->isHTML(true);
        $mail->Subject = "Hilfe Anfrage";
        $mail->Body = "
Kunde <br>
Mail: ". $username ." <br>
Anrede: ". $anrede ." <br> 
Vorname: ". $vorname ." <br>
Nachname: ". $nachname ." <br>
Straße: ". $stasse ." <br>
Hausnummer: ". $hausnummer ." <br>
Postleitzahl: ". $postleitzahl ." <br>
Ort: ". $ort ." <br>
Bundesland: ". $bundesland ." <br>
Festnetz: ". $festnetz ." <br>
Mobil 1: ". $mobil1 ." <br>
Mobil 2: ". $mobil2 ." <br>
Mail 2: ". $mail2 ." <br>
<br>
Kind <br>
Name: ". $name ." <br>
Geburtstag: ". $geburtstag ." <br>
Geburtsreihenvolge: ". $geburtsreihenvolge ." <br>
Groesse: ". $groesse ." <br>
Statur: ". $statur ." <br>
Verhalten: ". $verhalten ." <br>
Koerper: ". $koerper ." <br>
Geist: ". $geist ." <br>
Diabetis: ". $diabetis ." <br>
Asthma: ". $asthma ." <br>
chronische Krankheiten: ". $krankheiten ." <br>
Altersklasse: ". $altersklasse ." <br>

";
	
	
	
       
		
        if($mail->send()){
			echo "Schwimmlehrer erfolgreich informiert, bitte haben sie Gedult";
        } else {
            echo "Es gab einen Fehler ".$mail->ErrorInfo;
        }  		
}


?>
	
