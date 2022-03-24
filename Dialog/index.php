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
            <div class="logo">
                <img src="logo_schwimmschule.png" alt="logo" hight="30%" width="30%">
            </div>
            <h2>Wilkommen</h2>
            Hi :)
            Schön dass Du Dich für die Dich für die<br>
            "ICH-BIN-ANDERS"-Schwimmschulen mit dem Konzept der Wir-machen-Wassermenschen interessierst.<br><br>
            #angstfreiSchwimmenLernen ist ein<br> Schwimmkurskonzept welches DEIN<br> SCHWIMMLEHRER, der Dir diesen Link<br> geschickt hat, vertritt und verbreitet.<br><br>
            Dieses Konzept wurde über 8 Jahre<br> entwickelt und findet immer mehr<br> Anerkennung und entsprechend Anhänger.<br>
            Immer mehr Schwimmlehrer gliedern sich<br>
            deshalb diesem kindgerecht, spielerischem<br>
            Schwimmkonzept mit den Kernaussagen,<br>
            - Schwimmen ist Auftrieb<br>
            - Schwimmen ist Atmung<br>
            an.<br><br>
            Da Schwimmlehrer zumeist Einzelpersonen<br>
            sind, und ihre Kapazität schon stark mit<br>Schwimmkursen gefüllt ist, haben wie die<br>
            Kommunikation- den Dialog mit seinen<br> Basissinformationen- zentralisiert.<br>
            Eine direkte Kommunikation mit deinem<br> Schwimmlehrer ist natürlich weiterhin über<br>
            die Dir bekannten Kanäle möglich.<br>

            Wenn Du HIER jetzt Deine E-mail-Adresse<br>
            eingibst trittst Du in unser Dialog-System ein.<br><br>

            Was heisst Dialog-System?<br>
            Aufgrund der vielen Nachfragen und der<br> Komplexität der Gedankenbasis/Grundlagen,<br>
            werden hier die wirklich relevanten Dingen<br>
            für Deine Entscheidung-FÜR bzw. gegen<br> diese Art des Schwimunterrichts, bis hin zu<br>
            einem ZOOM-Call, besprochen.<br>
            Wir sind der Meinung dass Du am Ende des<br>
            "Dialogs" sehr genau weisst ob Du Dich<br> für unsere Art des "Schwimmen-lernens"<br> entscheiden willst. Entsprechend findest Du<br>
            natürlich am Ende des Dialog-Prozesses<br> Zugang zu unserem Buchungssystem.<br><br>
            Wir würden uns freuen wenn Du "eintrittst".

            <?php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            if (isset($_POST["submit"])) {
                add($_POST["name"]);

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
                $mail->addAddress($_POST["name"], "Alfred Hartmann");

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
sch&ouml;n, dass Du detaillierteres Interesse an meinen Schwimmkursen hast. Vielleicht bist Du ja schon ein wenig auf meiner <br> Website <br> Schwimmschule-Allgaeu<br> in die &ldquo;Ich-bin-Anders-Schwimmschule&ldquo; eingetaucht und hast dabei festgestellt, DA L&Auml;UFT <br> TATS&Auml;CHLICH VIELES ANDERS. Wenn nicht, mag ich Dir das wirklich im Vorfeld empfehlen! <br>
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
"
                    .
                    "https://wassermenschen.org/Dialog/termine.php/?mail=" . $_POST["name"] .
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
            ?>
                    <meta http-equiv="refresh" content="0; URL=email_erfolg.php" />
            <?php
                } else {
                    echo "Es gab einen Fehler " . $mail->ErrorInfo;
                }
            }
            ?>






            <form action="index.php" method="post" class="form">
                <div class="form__field">
                    <input type="text" name="name" placeholder="E-mail">
                </div>
                <div class="form__field">
                    <input type="submit" name="submit">
                </div>
            </form>

        </div>
    </div>

</body>

</html>