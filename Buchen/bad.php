<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Bad</title>
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
                <form action="bad.php" method="post">


                    <h3>Was ist dein Favoritbad?</h3>
                    <div class="box">
                        <select name="favoritbad">
                            <?php
                            for ($i = 1; $i <= getN("bad"); $i++) {
                                if (get_bath($i, "s_name") != "") {
                            ?>
                                    <option value=<?php echo get_bath($i, "s_name"); ?>> <?php echo get_bath($i, "name"); ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <br>
                    <br>
                    <input name="submit" type="submit">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $favoritbad    = array("favoritbad" => $_POST["favoritbad"]);
                    insert_favoritbad($favoritbad["favoritbad"]);
                    if (getP2(getK($_SESSION["id"])) == 1) {
                ?>
                        <meta http-equiv="refresh" content="0; URL = rabatt.php" />
                    <?php
                    } else {
                    ?>
                        <meta http-equiv="refresh" content="0; URL = rabatt2.php" />
                <?php
                    }
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