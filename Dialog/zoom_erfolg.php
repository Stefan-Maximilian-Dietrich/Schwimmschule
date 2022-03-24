<?php session_start(); ?>
<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<!DOCTYPE html>
<html lang="de">

    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" href="/../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

<body>
	<div class="grid align__item">
		<div class="register">
			
			
			    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


	
		
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
        $mail->addAddress($_SESSION["mail"], "Kunde");
        $mail->addAddress("schwimmschule.test@gmail.com", "Test");

        $mail->isHTML(true);
        $mail->Subject = "Zoom Link";
        $mail->Body = "	HI:) <br>

es freut mich dass Du am ZOOM-Call teilnehmen willst:). <br>

Der ZOOM-Call dient dazu, dass Du Deine Frage stellen kannst und ich diese für Dich und die anderen Teilnehmer beantwortet kann. <br>
Deine Frage dienen somit auch der Inspiration der anderen Zoom-Teilnehmer. Deshalb Bitte keine Zurückhaltung! Es gibt keine “dummen“<br>
Fragen! ..maximal eine chaotische Webseite:))<br>
<br>
Vielleicht nimmst du Dir 15 min vor dem ZOOM noch etwas Zeit um Dir Deine Fragen auf Deinem PC zu notieren und sie dann gleich zu <br>
Beginn des ZOOMs in den CHAT-Bereich des ZOOM-Calls zu kopieren.<br>
<br>
Nach meiner Vorstellungsrunde werde ich zunächst alle Fragen die ich dort finde beantworten- Hierzu haben wir 40 min Zeit.<br>
<br>
Hast Du Fragen die Du nicht öffentlich stellen willst, schreibe mir im CHAT-BEREICH ein PERSÖNLICHE NACHRICHT. Diese können andere<br>
Teilnehmer nicht sehen und ich kann Sie allgemeingültig beantworten. Oder Du rufst mich an. Ich bitte Dich aber allgemeinen Fragen <br>
im ZOOM-CHAT ÖFFENTLICH zu platzieren. Zum Nutzen Aller.<br>
<br>
Wenn wir die Fragerunde NICHT abschliessen können, werde ich im CHAT-Bereich einen 2.ten LOGIN zu einem weiteren ZOOM-Call der <br>
unmittelbar an diesen 40-minütigen ZOOM-Call anschliesst, veröffentlichen. <br>
<br>
Falls wir abschliessen können, wovon ich ausgehe, dient dieser 2. Link eher den technisch Interessierten, dem WIE, WAS und WARUM der<br>
Bewegungsabfolgen und der Veränderung des Schwimmsports.  (WEnn Du nicht dabei sein willst, keine Sorge, Du verpasst da nichts. Viel<br>
KNOW-HOW wird auch in den “Eltern-lehren-Schwimmen-Kursen“ kommuniziert.)<br>
<br>
Zu diesem Zeitpunkt MUSST Du noch nicht wissen WELCHEN Schwimmkurs Du wählen sollst! 1. führt Dich das Anmeldesystem zu den<br> RICHTIGEN KURSEN. Und 2.tens wirst Du innerhalb des ZOOM-Calls sicherlich herausfinden was Du aus dem Angebot möchtest.<br>
<br>
WO KANN ICH MICH ZUM SCHWIMMKURS ANMELDEN?<br>
Falls Du Dich für die SCHWIMMKURSE anmelden willst, findest gegen Ende des ZOOm-Calls einen Anmeldelink. Du kopierst diesen LINK aus<br>
dem CHAT-Bereich in deinen Browser. und sendest die Anfrage ab. Wir senden Dir dann den Zugang zu dem Anmeldebereich für die <br>
Schwimmkurse. <br>
<br>
HINWEIS: Die Anmeldung an Schwimmkursen ist nur CHAT-Teilnehmern zugänglich! Tut mir leid dass ich so verfahre. Ein Kind zu einem <br>
wassersicheren Schwimmer zu entwickeln dauert einfach eine gewisse Zeit. Wenn man 1,5 bis 3,5 Jahre zusammen an einem Ziel arbeitet,<br>
sollten wir uns über die Ziele einig sein.<br>
<br>
<br>
Vielen Dank für Deine Zeit! Ich freue mich jetzt auf unser gemeinsames Kennenlernen..<br>
<br>
<br>
<br>
vg alfred ...und bis ganz Bald.<br>
<br>
<br>
Alfred Hartmann lädt Sie zu einem geplanten Zoom-Meeting ein.<br>
<br>
Zoom ..Klappe die I. ;)<br>
WER STECKT HINTER DEM GANZEN?<br>
<br>
Thema: Sommer-Schwimm-Kurse SCHWIMMSCHULE ALLGAEU<br>
Uhrzeit: ". $_SESSION["tag"] ." 20:30 <br>
<br>
Zoom-Meeting beitreten<br>
https://zoom.us/j/91386932573?pwd=VE0vdFdmdERpRERLalVRVWpxbTFZQT09<br>
<br>
Meeting-ID: 913 8693 2573<br>
Kenncode: SqJ16r<br>
<br>
<br>
Zoom ..Klappe die II. ;)<br>
HINTERGRUNDINFOS FÜR TECHNIKINTERESSIERTE<br>
(Link im ZOOM-CHAT)<br>
<br>
Alfred (Hartmann)<br>
Mobil +49 170 70 88 015<br>
Festnetz +49 8379 810 90 25<br>
E-Mail: info@schwimmschule-allgaeu.de<br>
www.schwimmschule-allgaeu.de<br>
Gopprechts 10 | D-87448 Gopprechts<br>
";
		

        if($mail->send()){
			echo "Zoom-Link erfolgreich per Mail versandt";
        } else {
            echo "Es gab einen Fehler ".$mail->ErrorInfo;
        }

    ?>
			
			

			Email wurde erfolgreich verandt. <br>
			Vielen dank für ihr Intresse.	

	
	            </div>
        </div>
	
</body>

</html>