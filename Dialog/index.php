<?php  require(__DIR__. "/../Funktionen/all.php"); ?>
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
                <img src="/../Resourcen/logo_schwimmschule.png" alt="logo" hight="30%" width="30%">
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



<form action="index.php" method="post" class="form">
    <div class="form__field">
        <input type="text" name="name" placeholder="E-mail">
    </div>
    <div class="form__field">
        <input type="text" name="mobil" placeholder="Mobilnummer">
    </div>
    <div class="form__field">
        <input type="submit" name="submit">
    </div>
</form>

        </div>
    </div>

</body>

<?php

if (isset($_POST["submit"])) {
    add($_POST["name"], $_POST["mobil"]);
    if(mail_besaetigunh($_POST["name"]) == 1) {
        ?>
            <meta http-equiv="refresh" content="0; URL=email_erfolg.php" />
        <?php
    }
}
    ?>

</html>