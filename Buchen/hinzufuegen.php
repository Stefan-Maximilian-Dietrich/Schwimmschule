<?php require("functions.php"); ?>

<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <title>Hinzufügen</title>
        <link rel="stylesheet" href="./style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <!DOCTYPE html>
        <html lang="de">

        <head>

            <meta charset="UTF-8">
            <title>Hinzufügen</title>
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

        </head>

        <body class="align">

            <div class="grid align__item">
                Bereich von <?php echo $_SESSION["username"]; ?>
                <div class="register">

                    <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412">
                        <defs>
                            <linearGradient id="a" x1="0%" y1="0%" y2="0%">
                                <stop offset="0%" stop-color="#8ceabb" />
                                <stop offset="100%" stop-color="#378f7b" />
                            </linearGradient>
                        </defs>
                        <path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z" />
                    </svg>

                    <h3>Hinzufügen</h3>


                    <form action="hinzufuegen.php" method="post" class="form">

                        <div class="form__field">
                            <input type="text" name="name" placeholder="neuer.kunde">
							<input type="submit" class="theButton" name="hinzufuegen" value="hinzufügen" <?php ?>>
							<input type="submit" class="theButton" name="zurueck" value="zurück" <?php ?>>
                        </div>

                    </form>

						<?php
    if (isset($_POST['hinzufuegen'])) {
           add($_POST["name"]);
    } elseif (isset($_POST['zurueck'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = backoffice.php" />
    <?php
    }
	?>
                </div>

            </div>

        </body>

        </html>
        <!-- partial -->

    </body>

    </html>





<?php
} else {
?>
    Login erforderlich: <a href="index.php">hier</>
    <?php
}
    ?>