<?php require(__DIR__. "/../../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Bezahlen</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="grid align__item">
            Wilkommen <?php echo $_SESSION["username"]; ?>
            <div class="register">


                <form action="bezahlen.php" method="post">
                    <h3>Wie möchtest du bezahlen?</h3>
                    <?php
                    if (duration() > 1) {
                    ?>
                        <h3>10% zusatz Rabatt bei Einmalzahlung</h3>
                    <?php
                    }
                    ?>
                    <div class="box">
                        <select name="einmalzahlung">
                            <option value="einmalzahlung">Einmalzahlung</option>
                            <?php
                            if (duration() > 1) {
                            ?>
                                <option value="monatlich">monatlich</option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <br>
                    <br>
                    <input name="Senden" type="submit" value="Senden">
                </form>
                <?php
                if (isset($_POST['Senden'])) {
                    $bezahlung     = array("einmalzahlung" => $_POST["einmalzahlung"]);
                    insert_bezahlung($bezahlung["einmalzahlung"]);
                    evaluate();
                    calculate();
                ?>
                    <h4>Zu zahlen:</h4>

                    <?php
                    if ($_POST["einmalzahlung"] == "einmalzahlung") {
                    ?>
                        Einmalig <?php echo round(onetime(), 2); ?> €<br>
                        <a href="pdf.php" target="_blank">Rechnung</a> <br>
                        <br>
                    <br>
                        <form action="bezahlen.php" method="post">
                            <input name="Fertig" type="submit" value="Fertig">
                        </form>
                    <?php
                    } else {
                    ?>
                        Monatlich <?php echo round(monthly(), 2); ?> € für <?php echo duration(); ?> Monate <br>
                        <a href="pdf.php" target="_blank">Rechnung</a> <br>
                        <br>
                    <br>
                        <form action="bezahlen.php" method="post">
                            <input name="Fertig" type="submit" value="Fertig">
                        </form>


                <?php
                    }
                }
                if (isset($_POST['Fertig'])) {
                    ?>
                    <meta http-equiv="refresh" content="0; URL = kunden_bereich.php" />
                    <?php
                }
                ?>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
?>
    Login erforderlich: <a href="index.php">hier</>
    <?php
}
    ?>