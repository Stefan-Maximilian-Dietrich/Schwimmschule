<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["id"])) {
    $timeperiod_value = array("pfingsten", "zwischen", "sommer");
    $timeperiod_name = array("Pfingstferien", "zwischen Pfingst- und Sommerferien", "Sommerferien");




?>

    <html>

    <head>
        <title>Woche</title>
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
                <h3>Wochenrytmus: </h3><br>
                <h3>Wann hast du in den Sommerferien KEINE Zeit?</h3>

                <form action="woche3.php" method="post">

                    <?php
                    $week = array("Monatag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
                    for ($i = 1; $i <= 6; $i++) {


                    ?>
                        <h3> <?php echo $week[$i - 1]; ?> </h3>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 10 + $i * 100; ?> value=TRUE> 10-11 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 11 + $i * 100; ?>value=TRUE> 11-12 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 12 + $i * 100; ?> value=TRUE> 12-13 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 13 + $i * 100; ?> value=TRUE> 13-14 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 14 + $i * 100; ?> value=TRUE> 14-15 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 15 + $i * 100; ?> value=TRUE> 15-16 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 16 + $i * 100; ?> value=TRUE> 16-17 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 17 + $i * 100; ?> value=TRUE> 17-18 Uhr <br>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <input type="checkbox" name=<?php echo 18 + $i * 100; ?> value=TRUE> 18-19 Uhr <br>
                            <span class="checkmark"></span>
                        </label>

                    <?php

                    }
                    ?>

                    <br>
                    <br>

                    <input name="submit" type="submit">
                </form>



            </div>
        </div>
    </body>

    </html>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        for ($i = 100; $i <= 600; $i = $i + 100) {
            for ($j = 10; $j <= 18; $j++) {
                if (isset($_POST[$i + $j])) {
                    date_week(2, $i / 100, $j);
                }
            }
        }
    

  

    ?>
        <meta http-equiv="refresh" content="0; URL = urlaub.php" />
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