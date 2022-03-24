<?php require("functions.php"); ?>
<?php require("process_functions.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Kubden Anzeigen</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div class="grid align__item">
            Bereich von <?php echo $_SESSION["username"]; ?>
            <div class="register">

				<?php
				print_table();
				?>
                <br>
                <br>

              <form action="buchungen.php" method="post" class="form">
                <input type="submit" class="theButton" name="zurueck" value="zurück" <?php ?>>
                </form>
            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['zurueck'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = backoffice.php" />
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