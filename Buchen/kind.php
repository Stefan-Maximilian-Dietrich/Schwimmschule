<?php require(__DIR__. "/../Funktionen/all.php"); ?>

<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Kunde</title>
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

                <form action="kind.php" method="post" class="form">

                    <h3>Wie ist der Vorname deines Kindes?</h3>

                    <div class="form__field">
                        <input type="text" name="student_name" placeholder="Max" />
                    </div>
                    <h3>Wann ist dein Kind geboren?</h3>
                    <div class="form_date">
                        <input type="date" name="birth">
                    </div>
                    <br>
                    <br>

                    <input name="submit" type="submit">
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $student_name = $_POST["student_name"];
                    $custemor_name = $_SESSION["username"];
                    $student_number = read_lengthByString("students", "customer_name", $_SESSION["username"]) + 1;

                    $student      = array(
                        "name" => $_POST["student_name"],
                        "customer_name" => $_SESSION["username"],
                        "birth" => $_POST["birth"],
                        "student_number" => $student_number
                    );


                    insert_student($student);
                    $_SESSION["student_name"] = $student_name;


                ?>
                     <meta http-equiv="refresh" content="0; URL = attribute.php" />
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