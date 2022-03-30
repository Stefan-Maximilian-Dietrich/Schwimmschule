<?php require(__DIR__ . "/../../Funktionen/all.php"); ?>
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

                <form action="alternativ_bad.php" method="post">

                    <h3>Was sind deine Alternativbäder?</h3>
                    <?php
                    for ($i = 1; $i <= getN("bad"); $i++) {
                        if (read_alternativbad($_SESSION["favoritbad"], $i++) == 1) {
                    ?>
                            <label class="container">
                                <input type="checkbox" name=<?php $i; ?> value= 1> <?php echo read_name_by_id($i, "bad"); ?> <br>
                                <span class="checkmark"></span>
                            </label>
                    <?php
                        }
                    }
                    ?>
                    <br>
                    <br>
                    <input name="submit" type="submit">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    for ($i = 1; $i <= getN("bad"); $i++) {
                        if ($_POST[$i] == 1) {
                            update_bad($_SESSION["id"], $i++);
                        }
                    }

                ?>
                    <meta http-equiv="refresh" content="0; URL = kurs.php" />
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