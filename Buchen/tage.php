<?php require("functions.php"); ?>
<?php require("process_functions.php"); ?>
<?php
session_start();
if (isset($_SESSION["id"])) {


?>

    <html>

    <head>
        <title>Tage</title>
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

                <form action="tage.php" method="post" class="form">

                    <h3>Tag: </h3>
                    <div class="form_date">
                        <input type="date" name="date">
                    </div>
                    <br>
                    <label class="container">
                        <input type="checkbox" name=10 value=TRUE> 10-11 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=11 value=TRUE> 11-12 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=12 value=TRUE> 12-13 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=13 value=TRUE> 13-14 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=14 value=TRUE> 14-15 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=15 value=TRUE> 15-16 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=16 value=TRUE> 16-17 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=17 value=TRUE> 17-18 Uhr <br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name=18 value=TRUE> 18-19 Uhr <br>
                        <span class="checkmark"></span>
                    </label>

                    <input type="submit" name="more" value="weitere Tag">
                    <input type="submit" name="ready" value="Fertig">
                </form>
                <?php $_SESSION["control"]++; ?>


            </div>
        </div>
    </body>

    </html>
    <?php

    if (isset($_POST['more'])) {
        for ($i = 10; $i <= 18; $i++) {
            if (isset($_POST[$i])) {
                date_day($i, $_POST["date"]);
            }
        }
    } elseif (isset($_POST['ready'])) {
        for ($i = 10; $i <= 18; $i++) {
            if (isset($_POST[$i])) {
                date_day($i, $_POST["date"]);
            }
        }
        date_revers();

    ?>
        <meta http-equiv="refresh" content="0; URL = kunden_bereich.php" />
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