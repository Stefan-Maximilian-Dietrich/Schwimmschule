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
                <h3>Für welchen Kurs willst du Termine angeben?</h3>

                <form action="order_waelen.php" method="post">
                    <div class="box">
                        <select name="order">
                            <?php

                            for ($i = 1; $i <= read_lengthByString("students", "customer_name", $_SESSION["username"]); $i++) {
                                $student = read_Students_ByCustomerNumber($i);
                                for($j =1; $j <= read_lengthByStringOrders("orders", "student_name", $student); $j++) {
                                    if(read_orderTerminByNumber($j, $student) == 0) { 
                                        ?>
                                        <option value=<?php echo read_orderIdByNumber($j, $student); ?>> <?php echo read_Students_ByCustomerNumber($i). " - Bestellung: ".$j ; ?> </option>
                                        <?php
                                    }

                                }
                            ?>
                                
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

                    $_SESSION["id"] = $_POST["order"];
                    insert_sorder_time($_SESSION["id"]);

                ?>
                    <meta http-equiv="refresh" content="0; URL = woche1.php" />
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