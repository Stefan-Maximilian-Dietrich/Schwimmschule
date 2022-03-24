<?php require(__DIR__. "/../Funktionen/all.php"); ?>

<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <title>Backoffice</title>
        <link rel="stylesheet" href="/../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <!DOCTYPE html>
        <html lang="de">

        <head>

            <meta charset="UTF-8">
            <title>Backoffice</title>
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

        </head>

        <body class="align">

            <div class="grid align__item">
                Bereich von <?php echo $_SESSION["username"]; ?>
                <div class="register">

                    <h3>Hinzufügen</h3>


                    <form action="backoffice.php" method="post" class="form">

                        <div class="form__field">
							<input type="submit" class="theButton" name="hinzufuegen" value="hinzufügen" <?php ?>>
							<input type="submit" class="theButton" name="zurueck" value="Kunden" <?php ?>>
                        </div>

                    </form>

                </div>

            </div>

        </body>

        </html>
        <!-- partial -->

    </body>

    </html>
    <?php
    if (isset($_POST['hinzufuegen'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = hinzufuegen.php" />
    <?php
    } elseif (isset($_POST['zurueck'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = kunden_anzeigen.php" />
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