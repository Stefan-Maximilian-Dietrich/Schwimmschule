<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>rabatt</title>
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

                <form action="rabatt.php" method="post">

                    <h3>Was sind deine Alternativbäder?</h3>
                    <?php
                    for ($i = 1; $i <= getN("bad"); $i++) {
                        if (getS("bad", $i, "s_name") != getT("form", $_SESSION["id"], "favoritbad")) {
                            if (get_bath($i, "s_name") != "") {
                    ?>
                                <label class="container">
                                    <input type="checkbox" name=<?php echo get_bath($i, "s_name"); ?> value=TRUE> <?php echo get_bath($i, "name"); ?> <br>
                                    <span class="checkmark"></span>
                                </label>
                    <?php
                            }
                        }
                    }
                    ?>

                    <h3>Zu welchen Zeiten kannst du??</h3>
                    <label class="container">
                        <input type="checkbox" name="zeitblock1" value=TRUE> Zeitblock 1 - Montag, Dienstag, Mittwoch<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="zeitblock2" value=TRUE> Zeitblock 2 - Donnerstag, Freitag, Samstag<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 1 - VORMITTAGS </h3>
                    <label class="container">
                        <input type="checkbox" name="b1u10" value=TRUE> 10 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u11" value=TRUE> 11 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u12" value=TRUE> 12 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 1 - RANDZEITEN </h3>
                    <label class="container">
                        <input type="checkbox" name="b1u13" value=TRUE> 13 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u14" value=TRUE> 14 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u18" value=TRUE> 18 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 1 - HIGH-PEAK-ZEITEN </h3>
                    <label class="container">
                        <input type="checkbox" name="b1u15" value=TRUE> 15 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u16" value=TRUE> 16 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b1u17" value=TRUE> 17 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 2 - VORMITTAGS </h3>
                    <label class="container">
                        <input type="checkbox" name="b2u10" value=TRUE> 10 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u11" value=TRUE> 11 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u12" value=TRUE> 12 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 2 - RANDZEITEN </h3>
                    <label class="container">
                        <input type="checkbox" name="b2u13" value=TRUE> 13 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u14" value=TRUE> 14 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u18" value=TRUE> 18 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <h3>Zeitblock 2 - HIGH-PEAK-ZEITEN </h3>
                    <label class="container">
                        <input type="checkbox" name="b2u15" value=TRUE> 15 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u16" value=TRUE> 16 Uhr<br>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="b2u17" value=TRUE> 17 Uhr<br>
                        <span class="checkmark"></span>
                    </label>

                    <br>
                    <br>
                    <input name="submit" type="submit">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $discount_bad  = array(
                        "wertach" => istrue($_POST["wertach"]),
                        "missen" => istrue($_POST["missen"]),
                        "leutkirch" => istrue($_POST["leutkirch"]),
                        "kirchdorf" => istrue($_POST["kirchdorf"]),
                        "erkheim" => istrue($_POST["erkheim"]),
                        "memmingenfrei" => istrue($_POST["memmingenfrei"]),
                        "dietmansried" => istrue($_POST["dietmansried"]),
                        "pfronten" => istrue($_POST["pfronten"]),
                        "immenstadt" => istrue($_POST["immenstadt"]),
                        "wangen" => istrue($_POST["wangen"]),
                        "kemptencambo" => istrue($_POST["kemptencambo"]),
                        "memmingenhalle" => istrue($_POST["memmingenhalle"])
                    );
                    $discount_time = array(
                        "zeitblock1" => istrue($_POST["zeitblock1"]),
                        "zeitblock2" => istrue($_POST["zeitblock2"]),
                        "b1u10" => istrue($_POST["b1u10"]),
                        "b1u11" => istrue($_POST["b1u11"]),
                        "b1u12" => istrue($_POST["b1u12"]),
                        "b1u13" => istrue($_POST["b1u13"]),
                        "b1u14" => istrue($_POST["b1u14"]),
                        "b1u15" => istrue($_POST["b1u15"]),
                        "b1u16" => istrue($_POST["b1u16"]),
                        "b1u17" => istrue($_POST["b1u17"]),
                        "b1u18" => istrue($_POST["b1u18"]),
                        "b2u10" => istrue($_POST["b2u10"]),
                        "b2u11" => istrue($_POST["b2u11"]),
                        "b2u12" => istrue($_POST["b2u12"]),
                        "b2u13" => istrue($_POST["b2u13"]),
                        "b2u14" => istrue($_POST["b2u14"]),
                        "b2u15" => istrue($_POST["b2u15"]),
                        "b2u16" => istrue($_POST["b2u16"]),
                        "b2u17" => istrue($_POST["b2u17"]),
                        "b2u18" => istrue($_POST["b2u18"])
                    );

                    insert_discount_bad($discount_bad);
                    insert_discount_time($discount_time);

                ?>
                    <meta http-equiv="refresh" content="0; URL = bazhalen.php" />
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