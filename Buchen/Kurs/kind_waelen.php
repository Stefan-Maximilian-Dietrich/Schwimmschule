<?php require(__DIR__. "/../Funktionen/all.php"); ?>

<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Kunde</title>
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
                <h3>Für welches Kind willst du einen Kurs buchen?</h3>

                <form action="kind_waelen.php" method="post">
                    <div class="box">
                        <select name="student_name">
                            <?php

                            for ($i = 1; $i <= read_lengthByString("students", "customer_name", $_SESSION["username"]); $i++) {
                            ?>
                                <option value=<?php echo read_Students_ByCustomerNumber($i); ?>> <?php echo read_Students_ByCustomerNumber($i); ?> </option>
                            <?php
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
                    $student_name = $_POST["student_name"];
                    $custemor_name = $_SESSION["username"];
                    $number_orders = get_order_number($student_name, $custemor_name) + 1;

                    insert_order($custemor_name, $student_name, $number_orders);
                    $_SESSION["id"] = get_order_id($custemor_name, $student_name, $number_orders);



                ?>
                    <meta http-equiv="refresh" content="0; URL = favorit_bad.php" />
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