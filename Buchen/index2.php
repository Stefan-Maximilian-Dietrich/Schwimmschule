<?php require(__DIR__. "/../Funktionen/all.php"); ?>

<?php
session_start();
$verhalten = 0;
echo $_POST["passwort"];
if (!isset($_SESSION["name"]) and !isset($_GET["page"])) {
    $verhalten = 0;
}
if ($_GET["page"] == "log") {
    $name = $_POST["name"];
    $passwort = $_POST["passwort"];

    echo $name;
    echo $passwort;

    if ($name == "Alfred.Hartmann" and $passwort == "Sommer2022") {
        $_SESSION["name"] = $name;
        $verhalten = 1;
    } else {
        $verhalten = 2;
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Schwimmschule</title>
    <link rel="stylesheet" href="/../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="de">

    <head>

        <meta charset="UTF-8">
        <title>Schwimmschule</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        if ($verhalten == 1) {
        ?>
            <meta http-equiv="refresh" content="0; URL = backoffice.php" />
        <?php
        }
        ?>

    </head>

    <body class="align">





        <?php
        if ($verhalten == 0) {
        ?>
            <div class="grid align__item">

                <div class="register">

                    <h2>Wilkommen</h2>

                    <form action="index2.php?page=log" method="post" class="form">

                        <div class="form__field">
                            <input type="text" name="name" placeholder="Max.Musterfrau" />
                        </div>

                        <div class="form__field">
                            <input type="password" name="passwort" placeholder="••••••••••••">
                        </div>

                        <div class="form__field">
                            <input type="submit" value="Einloggen">
                        </div>

                    </form>


                </div>

            </div>
        <?php
        }
        if ($verhalten == 1) {
        ?>
            Login Erfolgreich, Sie werden weitergeleitet...
        <?php
        }
        if ($verhalten == 2) {
        ?>
            Passwort oder Username falsch, <a href="index2.php">zurück</>.
            <?php
        }
            ?>

    </body>




</body>

</html>
<!-- partial -->

</body>

</html>