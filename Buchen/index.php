<?php require("functions.php"); ?>
<?php require("insert_functions.php"); ?>
<?php require(__DIR__. "/../Funktionen/read.php"); ?>


<?php

session_start();
$verhalten = 0;

if (!isset($_SESSION["username"]) and !isset($_GET["page"])) {
    $verhalten = 0;
}
if ($_GET["page"] == "log") {

    $name1 = $_POST["user"];

    if ($name1 == "Alfred.Hartmann") {
        $_SESSION["username"] = $name1;
        $verhalten = 1;
    } else {
        if (check($name1)) {
            $_SESSION["username"] = $name1;
            $verhalten = 3;
        } else {
            $verhalten = 2;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Schwimmschule</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

</head>

<body>

    <!DOCTYPE html>
    <html lang="de">

    <head>

        <meta charset="UTF-8">
        <title>Schwimmschule</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

        <?php
        if ($verhalten == 1) {
        ?>
            <meta http-equiv="refresh" content="0; URL=index2.php" />
        <?php
        }
        ?>
        <?php
        if ($verhalten == 3) {
			
			if (check_angemeldet() == 0){
				?>
					<meta http-equiv="refresh" content="0; URL=kunden_bereich.php" />
				<?php
			
			} else {
			?>
					<meta http-equiv="refresh" content="0; URL=eltern.php" />
		
			<?php
			}
		
		?>
	
            
	
		<?php
		
        }
        ?>

    </head>

    <body class="align">


        <?php
        if ($verhalten == 0) {
        ?>
            <div class="grid align__item">

                <div class="register">




                    <div class="logo">
                        <img src="logo_schwimmschule.png" alt="logo" hight="30%" width="30%">
                    </div>

                    <h2>Wilkommen</h2>
					Willkommen auf der Buchungsplatform<br>
der Lizenzschwimmschulen von<br>
Wir-machen-Wassermenschen.<br><br>
"'angstfrei-Schwimmen-lernen" ist ein<br>Schwimmkurskonzept das mit all den alten<br>
Herangehensweisen gebrochen hat. Ein<br>modernes spielerisches Konzept lässt Deine<br>
Kinder ganz nebenbei RICHTIG schwimmen<br>
lernen.<br><br> 
Du hast Dich durch viele Neubetrachtungen<br>
des Schwimmunterrichts "durchschlagen"<br>
müssen um hier her zu gelangen Für Deine <br>
neutral-offene Betrachtungsfähigkeit eines <br>
Themas möchte wir Dir danken.<br><br>
Jetzt geht es los! Deine bisher benutzte<br> E-Mail-Adresse ist dein Entré.<br>
Logge Dich mit dieser ein.<br><br>
Das System führt Dich nach der<br>Datenerfassung zunächst von Dir und dann<br>
Deines Kindes zu dem zur Buchung<br>freigegebenen Schwimmkurs(en). Du musst Dir<br>
also nicht allzuviel Kopf drüber machen<br> WAS IST DER RICHTIGE KURS.<br>
Wir haben dem System beigebracht was <br>
DER RICHTIGE KURS ist. Und das schlägt es <br> Dir vor. Manchmal kannst du dennoch <br> zwischen 2 wählen. Aber das wird Dir leicht<br>
fallen. Davon sind wir überzeugt.<br>
Solltest Du trotzdem der Meinung sein es<br>
stimmt etwas nicht, hast Du selbstver-<br>ständlich die Gelegenheit das zur Über-<br>prüfung "einzusenden". Nutze dafür dann<br>den angegebenen SERVICE-Button<br><br>. 
Ein paar Worte zur Preisgestaltung.<br>
Das System ist sehr flexible und nimmt Deine<br>
Wünsche WANN dein Schwimmkurs statt-<br>
finden soll ernst. Es werden daher alle Zeiten<br>
von Dir erfasst an welchen DU und<br> demgemäss vermutlich Dein Kind NICHT<br> KANN! Und zwar immer wieder nach dem<br>
neuen Kindergarten-/Schulhalbjahr.<br> Allerdings sollte Dir bewusst sein dass von<br>
Dir sehr eingeschränkte Zeiträume auch sehr<br>
schwierig mit weiteren Gruppenmitgliedern<br>
zu belegen sind. Aus diesem Grund bringt Dir<br>
die maximale Flexibiltät den besten Preis.<br>

Und jetzt viel Spass beim Buchen!

                    <form action="index.php?page=log" method="post" class="form">

                        <div class="form__field">
                            <input type="text" name="user" placeholder="Max.Musterfrau" />
                        </div>

                        <div class="form__field">
                            <input type="submit" value="Einloggen">
                        </div>

                    </form>


                </div>

            </div>
        <?php
        }

        if ($verhalten == 2) {
        ?>

            <div class="grid align__item">

                <div class="register">


                    <div class="logo">
                        <img src="logo_schwimmschule.png" alt="logo" hight="30%" width="30%">
                    </div>



                    <h2>Wilkommen</h2>
					

                    <form action="index.php?page=log" method="post" class="form">

                        <div class="form__field">
                            <input type="text" name="user" placeholder="Max.Musterfrau" />
                        </div>

                        <div class="form__field">
                            <input type="submit" value="Einloggen">
                        </div>

                    </form>

                    Login felgeschlagen <br>
                    <br>
                    Falls sie noch nicht Registriert sind freuen wir uns darauf sie bei uns begrüßen zu dürfen.
                    Nutzen sie dazu gerne eine unserer Kontaktmöglichkeiten. <br>

                    E-mail: <a href="mailto: schwimmschule.allgaeu@gmail.com">schwimmschule.allgaeu@gmail.com</a> <br>
                    Telefon: <a href="tel:+491707088015">0170/7088015</a><br>
                    WhatsApp: <a href="https://wa.me/491707088015">0170/7088015</a><br>
                </div>


            </div>

        <?php
        }
        ?>

    </body>




</body>

</html>

</body>

</html>