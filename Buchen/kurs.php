<?php require(__DIR__. "/../Funktionen/all.php"); ?>



<?php
session_start();
if (isset($_SESSION["id"])) {
?>

    <html>

    <head>
        <title>Kurs</title>
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

                <form action="kurs.php" method="post">

                    <h3>Wecher Kurs möchtest du Buchen</h3>

                    <div class="box">
                        <select name="kurs">
                            <?php

                            for ($i = 1; $i <= getN("price_list"); $i++) {

                                if (course_available(getS("price_list", $i, "s_name"))) {
                            ?>
                                    <option value=<?php echo getS("price_list", $i, "s_name"); ?>> <?php echo getS("price_list", $i, "name"); ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
					<?php
					?>
                    <br>
                    <br>
					 <input type="submit" class="theButton" name="senden" value="Senden" <?php ?>>
					Wenn sie hilfe Benötigen zögern sie nicht den "HILFE!"-Knopf zu drücken, der für sie zuständige Schwimmlehrer 						wird sich in kürze bei ihnen melden.
					 <input type="submit" class="theButton" name="hilfe" value="HILFE!" <?php ?>>
                </form>

                <?php
                if (isset($_POST['senden'])) {
                    $id      = array("id" => $_SESSION["id"]);
                    $kurs          = array("kurs" => $_POST["kurs"]);

                    insert_id($id["id"]);
                    insert_kurs($kurs["kurs"]);
                ?>
                    <meta http-equiv="refresh" content="0; URL = bad.php" />
                <?php
                } elseif (isset($_POST['hilfe'])) {
					mail_hilfe();
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