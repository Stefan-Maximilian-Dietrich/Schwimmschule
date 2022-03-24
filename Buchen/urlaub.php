<?php require("functions.php"); ?>
<?php require("process_functions.php"); ?>
<?php
session_start();
if (isset($_SESSION["id"])) {
    $timeperiod_value = array("pfingsten", "zwischen", "sommer");
    $timeperiod_name = array("Pfingstferien", "zwischen Pfingst- und Sommerferien", "Sommerferien");
    echo $_SESSION["control"];

?>

    <html>

    <head>
        <title>Urlaub</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div class="grid align__item">
            Wilkommen <?php echo $_SESSION["username"]; ?>


            <div class="register">
                <h3>Urlaub </h3><br>
                <h3><?php echo $timeperiod_name[$_SESSION["control"]]; ?></h3>


                <form action="urlaub.php" method="post" class="form">

                    <h3>Von: </h3>
                    <div class="form_date">
                        <input type="date" name="date_start">
                    </div>
                    <br>
                    <br>
                    <h3>Bis: </h3>
                    <div class="form_date">
                        <input type="date" name="date_end">
                    </div>
                    <br>
                    <br>

                    <input type="submit" name="more" value="weitere Urlaub">
                    <input type="submit" name="ready" value="Fertig">
                </form>
                <?php $_SESSION["control"]++; ?>


            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['more'])) {
        date_holiday($_POST["date_start"], $_POST["date_end"]);
    } elseif (isset($_POST['ready'])) {
        date_holiday($_POST["date_start"], $_POST["date_end"]);

    ?>
        <meta http-equiv="refresh" content="0; URL = tage.php" />
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