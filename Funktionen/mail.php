<?php
 require("process.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mail_hilfe() {

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
Mail: " . $username . " <br>
Anrede: " . $anrede . " <br> 
Vorname: " . $vorname . " <br>
Nachname: " . $nachname . " <br>
Straße: " . $stasse . " <br>
Hausnummer: " . $hausnummer . " <br>
Postleitzahl: " . $postleitzahl . " <br>
Ort: " . $ort . " <br>
Bundesland: " . $bundesland . " <br>
Festnetz: " . $festnetz . " <br>
Mobil 1: " . $mobil1 . " <br>
Mobil 2: " . $mobil2 . " <br>
Mail 2: " . $mail2 . " <br>
<br>
Kind <br>
Name: " . $name . " <br>
Geburtstag: " . $geburtstag . " <br>
Geburtsreihenvolge: " . $geburtsreihenvolge . " <br>
Groesse: " . $groesse . " <br>
Statur: " . $statur . " <br>
Verhalten: " . $verhalten . " <br>
Koerper: " . $koerper . " <br>
Geist: " . $geist . " <br>
Diabetis: " . $diabetis . " <br>
Asthma: " . $asthma . " <br>
chronische Krankheiten: " . $krankheiten . " <br>
Altersklasse: " . $altersklasse . " <br>

";





	if ($mail->send()) {
		echo "Schwimmlehrer erfolgreich informiert, bitte haben sie Gedult";
	} else {
		echo "Es gab einen Fehler " . $mail->ErrorInfo;
	}
}


function mail_besaetigunh($name)
{
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
	$mail->addAddress($name, "Alfred Hartmann");

	$mail->isHTML(true);
	$mail->Subject = "Anfrage Schwimmkurs /Zoom";
	$mail->Body = "
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
    </head>
<body>
Hallo,  <br> 

<br>
sch&ouml;n, dass Du detaillierteres Interesse an meinen Schwimmkursen hast. Vielleicht bist Du ja schon ein wenig auf meiner <br> Website <br> Schwimmschule-Allgaeu<br> in die &ldquo;Ich-bin-Anders-Schwimmschule&ldquo; eingetaucht und hast dabei festgestellt, DA L&Auml;UFT <br> 
TATS&Auml;CHLICH VIELES ANDERS. Wenn nicht, mag ich Dir das wirklich im Vorfeld empfehlen! <br>
Zun&auml;chst noch eine WIRKLICHE WICHTIGE ANGELEGENHEIT. <br>
<br>
Wenn Du E-Mails von den WASSERMENSCHEN bekommst, bitte ich Dich, ausschliesslich mit den dort genannten LINKS zu kommunizieren. <br>
<br>
Die DIREKTE Kommunikation, falls du allgemeine oder eben weitere Fragen hast, läuft über die E-Mail-Adresse deiner Schwimmschule. Oder eben über deren sonstigen Kan&auml;len (zb. info@schwimmschule-allgaeu.de) <br>
<br>
Um mich und meine Art des Schwimmunterrichts n&uuml;her kennenzulernen, und um Deine Fragen zu beantworten, veranstalte ich ZOOM- Calls. <br>
<br>

Da die Fragen immer sehr &auml;hnlich sind bzw. auch durch andere Eltern f&uuml;r dich vielleicht neue spannende Fragen aufkommen, bin ich von <br> 
Einzelgespr&auml;chen auf diese Gruppentreffen in ZOOM umgestiegen. Sollte dennoch eine Frage offen bleiben, k&ouml;nnen wir diese <br> selbstverst&auml;ndlich im Nachhinein kl&auml;ren. <br>   
 <br>
Die Zoom-Calls finden immer, oder zumindest zumeist <br>
<br>
MITTWOCH und <br>
SONNTAG jeweils um 20:30 Uhr. <br>
<br>
Sch&ouml;n, dass Du dabei sein willst! <br>
<br>
Um Dir aber keine Zeit zu stehlen Kurz ein paar Dinge vorweg: <br>
<br>
Nahezu alle Schwimmschulen sind ausgebucht. Und auch ich bin das. Aber oft findet sich f&uuml;r wirklich Interessierte immer noch eine <br>
M&ouml;glichkeit.<br>
<br>
Allerdings will ich bei Dir auch noch einen Gedanken ansto&szlig;en..<br>
<br>
Ist es Dir nicht wichtig MIT WEM DEIN KIND SCHWIMMEN-LERNEN SOLL? <br>
<br>
Du kaufst ja auch nicht irgendein Auto das gerade zu haben ist. Egal von welcher Marke. Und das obwohl Du dein Auto maximal 10..15 <br>
Jahre f&auml;hrst. <br>
<br>
Dein Kind hingegen lernt nur 1 MAL im Leben schwimmen.<br>
Deshalb finde ich, es hat die passende, RICHTIGE Schwimmschule verdient!<br>

#angstfei-Schwimmen-lernen ist unser Motto seit nunmehr 8 Jahren. Und ich verspreche Dir, Dein Kind und Du, Ihr werdet begeistert<br>
sein. Auf wirkliches Gutes lohnt es sich manchmal auch mal ein klein bisschen warten.<br>
<br>
Check doch im Weiteren mal, ob meine Vorstellungen 	&rdquo;Schwimmen-lernen&rdquo; zu Deiner Vorstellung passt.<br>
<br>
Tauchen wir deshalb jetzt doch einfach Mal ein in MEINE Wasserwelt :-)<br>
<br>
<br>
Nehmen wir Mal an...<br>

Wie w&auml;re Dein Familienleben, wenn Du, selbst mit Kindern,<br>
<br>
- die Freizeit am Wasser, genauso wie in Deiner Jugend genie&szlig;en k&ouml;nntest?<br>
- in aller Ruhe den Familienurlaub am Meer vertieft in ein Buch verbringst?<br>
- mit Freunden, trotz Kindern im Wasser, in Ruhe einen Kaffee am See trinkst gehst?<br>
- endlich einen Pool in den Garten bauen kannst ohne an m&ouml;gliche Konsequenzen zu denken?<br>
<br>
Du das Alles tun kannst OHNE, dass Du ein schlechtes Gewissen oder Sorgen um die Sicherheit Deines Kindes hast?<br>
<br>
W&auml;re das nicht die totale Freiheit?<br>
<br>
Zusammen k&ouml;nnen wir diese Freiheit am Wasser f&uuml;r Dich bereits ab einem Kindesalter von 5 Jahren erreichen. Ein 6-7 Jahre altes Kind<br> 
kann dann schon (je nachdem in welchem Alter es bei mir eingestiegen ist) im freien Wasser eines Sees 1 Stunde von der Mitte aus<br> zur&uuml;ckschwimmen.<br>
<br>
Im Zoom Call m&ouml;chte ich folgende Themen gerne mit dir durchgehen:<br>   
<br>
<br>
Wie erhaltet ihr eure Freiheit als Eltern zur&uuml;ck und wie erlernen die Kinder eine derartige Wassersicherheit in relativ kurzer Zeit?<br>
&ldquo;Wie sieht meine Herangehensweise aus?&ldquo;<br>
<br>
Ich werde Dir von meinem tiefsten Bed&uuml;rfnissen bzgl des Schwimmen-lernens Deiner Kinder erz&auml;hlen. Und von der INNEREN Wahrheit einer <br>
Sache und der &Auml;USSEREN.<br>
<br>
Zudem werden wir Euren Wunsch &ldquo;Mein Kind soll Schwimmen lernen&ldquo; in erreichbare und vor allem PLANBARE N&auml;he r&uuml;cken.<br>
<br>
Was mir im Vorfeld bereits wichtig ist, nimm deshalb mal folgende Aussage bewusst wahr.<br>
<br>
&ldquo;Schwimmen-k&ouml;nnen oder eben nicht, beeinflusst unser Familienleben entscheidend.&ldquo;<br>
<br>
Wenn dem so ist, wird vermutlich Dein Partner Dich im Nachgang zu dem ZOOM l&ouml;chern.<br>
<br>
Alles folgerichtig wiederzugeben ist nach einmal h&ouml;ren nicht ganz einfach. Zudem ist das was man f&uuml;hlt oder sp&uuml;rt, a. bei Kinder-<br>
Themen elementar, und b. nicht zwangsl&auml;ufig dem Anderen vermittelbar.<br>
<br>
Deshalb, um Dir bohrenden Fragen Deines Partners zu ersparen und eine wirklich wichtige Entscheidung am Besten sofort im Anschluss<br>
treffen zu k&ouml;nnen, Pl&auml;tze hab ich n&auml;mlich nicht &uuml;ppig, lade Deinen Partner doch einfach zu dem ZOOM mit ein! Damit h&ouml;rt er Alles aus<br>
1. Hand. Und Ihr habt danach das Thema vom Tisch. &ldquo;F&uuml;hlt&ldquo; da Beide rein.<br>
<br>
Wenn Euch mein Konzept zusagt, seid Ihr Zusammen und habt somit eine gemeinsame Basis f&uuml;r diese WICHTIGE Entscheidung! Und als <br>
kleine Entscheidungshilfe gibt es f&uuml;r Eure Buchung innerhalb der ersten 24 Std nach dem ZOOM, die Schwimmbrille f&uuml;r die Kids von mir<br>
oben drauf;)<br>
<br>
Es bleibt Eure Entscheidung. WASSER ist einfach eine der sch&ouml;nsten Dinge der Welt. Und leider auch eines der gef&auml;hrlichsten!<br>
<br>
<br>
Was Du vielleicht noch &uuml;ber mich wissen m&ouml;chtest:<br>
Vor 8 Jahren startete ich die SCHWIMMSCHULE ALLG&Auml;U mit meinem &ldquo;ICH-BIN-ANDERS-Schwimmkurs-Konzept&ldquo;<br>
<br>
- Schwimmkurse nur im Freibad<br>
- Spass anstelle von Geschrei<br>
- spielend Schwimmen lernen<br>
- kein Schwimmunterricht im herk&ouml;mmlichen Sinne<br>
- Erstes R&uuml;ckenschwimmen bereits im Babybecken<br>
- Aufbauende 3-Tages-Schwimmkurse in einem Modul-System<br>
- Schwimmen-lernen in Neoprenanz&uuml;gen<br>
- Schwimmkurse ab 2Jhr (82cm K&ouml;rpergr&ouml;&szlig;e)<br>
<br>
Mit diesem Konzept hat sich die Schwimmschule Allg&auml;u etabliert.<br>
<br>
Viele haben mir mit 5* Sternen auf Facebook und Google ihre Zustimmung f&uuml;r diesen besonderen Weg des #angstfrei-Schwimmen-lernens<br>
erteilt.<br>
<br>
Was mir besonders gef&auml;llt, vergangenes Jahr hat der Schulschwimm-Koordinator der Stadt Kempten es aus seinem, einem v&ouml;llig anderen<br>
Betrachtungswinkel, formuliert,<br>
&rdquo;...Was mir bei Deiner Sichtweise besonders gef&auml;llt, ist, dass sie aus der Perspektive des Kindes erfolgt. Das begegnet einem nicht<br>
oft.&rdquo; Fabian Ellroth (Vater 3er Kinder, Jugendwart Schwimmen TVK)<br>
<br>
Ich w&uuml;rde mich riesig freuen wenn Du Dir die LOGIN -Daten f&uuml;r den Zoom-Call holst! Die Pl&auml;tze sind leider oft recht schnell weg.<br> Schreib mich einfach an.   <br>
<br>
Mein Angebot wird Dir, ein St&uuml;ck Eurer Freiheit und Sorglosigkeit zur&uuml;ckgeben. Zumindest in Punkto Wasser. Und garantiert ein weit <br>
SELBSTBEWUSSTERES Kind.<br>
<br>
Noch etwas zum Zoom-Call.. dieser ist 2-teilig.<br>
<br>
Im ersten Teil geht es darum den Menschen hinter der Aussage<br>
&ldquo;Ich gebe Euch Eure Freiheit zur&uuml;ck.&ldquo;, kennenzulernen. Also MICH;). Dauer 30 min. Den Meisten gen&uuml;gt die Aussage, &rdquo;...Ein 6-7 Jahre<br>
altes Kind kann nach Modul 9/10, King-/Queen-of-the-Lake, im freiem Wasser eines Sees eine Stunde von der Mitte aus <br>
zur&uuml;ckschwimmen.&rdquo;<br>
<br>
Den Rest regelt die GARANTIE.<br>
<br>
Falls Du jemand bist der genau wissen will WIE alles funktioniert, WIE ich die Ziele sicher erreiche, erk&auml;re ich das gerne im <br>
zweiten Teil. Nimm Dir weitere 45 min Zeit. Je nach Fragen. Den Link dazu erh&auml;ltst Du im 1.Teil des Zoom-Calls.<br>
<br>
<br>
Wir sehen uns! ..per Zoom;)<br>
<br>
Deine Anmeldung läuft ausschließlich über den nachfolgenden Link und funktioniert nicht über eine schlichte Antwort-Mail. <br>
<br>
"
		.
		"https://wassermenschen.org/Dialog/termine.php/?mail=" . $name .
		"
<br>
<br>
Viele Gr&uuml;&szlig;e<br>
<br>
SCHWIMMSCHULE ALLG&Auml;U<br>
WIR MACHEN WASSERMENSCHEN<br>
<br>
PS<br>
Ich hoffe wir sind der gleichen Meinung.<br>
<br>
SCHWIMMEN IST WICHTIG!<br>
Und ist viel wichtiger wie Skifahren, Fu&szlig;ballspielen, Ballett oder Reiten!<br>
<br>
Und, GUT SCHWIMMEN macht wirklich Sinn!<br>
Kein Elternteil m&ouml;chte ein Kind im Wasser verlieren.<br>
Egal ob mit 5 oder 10 Jahren Oder mit 15..,20.., 25.., 30. Wenn all die Funsportarten im Wasser, wie Rafting, Canyoning, Kajak,<br> Kanu, Surfen, Kiten, Cliffjumping und Wasserskifahren oder Wakeboarden ausprobiert werden. Oder mit 35.., 40.., 45 Jahren w&auml;hrend <br>
sie f&uuml;r die Wassersicherheit der Enkel sorgen.<br>
<br>
Ach ja... Hier findest Du kindgerecht animiert die Schwimmtechnik die ich unterrichte:);) Schwimmst Du so?<br>
<br>
https://youtu.be/ItRtk_eP5EQ<br>
</body>
</html>
";


	if ($mail->send()) {

		return 1;

	} else {
		echo "Es gab einen Fehler " . $mail->ErrorInfo;
	}

}

function mail_termin(){
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
https://us05web.zoom.us/j/89358197421?pwd=NmJYTlQ3dGdqdjZ0U2pxVkFPYnhQZz09<br>
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

}

?>