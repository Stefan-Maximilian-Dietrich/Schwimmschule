<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Kunden Bereich</title>
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

                <form action="kunden_bereich.php" method="post" class="form">

                    <input type="submit" class="theButton" name="neues" value="neues Kind alegen" <?php ?>>

                    <input type="submit" class="theButton" name="buchen" value="neue Kurs buchung" <?php echo disable("students", "customer_name", $_SESSION["username"]); ?>>

                    <input type="submit" class="theButton" name="termine" value="Termine für Kurs" <?php echo disable("orders", "customer_name", $_SESSION["username"]); ?>>

                    <input type="submit" class="theButton" name="buchungen" value="Buchungen" <?php echo disable("orders", "customer_name", $_SESSION["username"]); ?>>

                </form>
            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['neues'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = kind.php" />
    <?php
    } elseif (isset($_POST['buchen'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = Kurs/kind_waelen.php" />
    <?php
    } elseif (isset($_POST['termine'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = order_waelen.php" />
    <?php
    } elseif (isset($_POST['buchungen'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = buchungen.php" />
    <?php
    }
    ?>


<?php
} else {
?>
    Login erforderlich: <a href="index.php">hier</>
    <?php
}
    ?>
