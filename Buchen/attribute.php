<?php require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["student_name"])) {
?>

    <html>

    <head>
        <title>Attribute</title>
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
                <form action="attribute.php" method="post">

                    <?php
                    for ($i = 1; $i <= read_attribute_number(); $i++) {
                    ?>

                        <h3> <?php echo read_attribute_ByNumber("attribiute_name", $i); ?> </h3>

                        <div class="box">
                            <select name=<?php echo read_attribute_ByNumber("attribiute_value", $i); ?>>

                                <?php
                                for ($j = 1; $j <= read_characteristics_numberById($i); $j++) {
                                ?>

                                    <option value=<?php echo read_characteristics_valueByIDJd($i, $j); ?>> <?php echo read_characteristics_nameByIDJd($i, $j); ?> </option>

                                <?php
                                }
                                ?>

                            </select>

                        </div>
                        <br>
                        <br>
                    <?php
                    }
                    ?>

                    <br>
                    <br>
                    <input name="Fertig" type="submit" value="Fertig">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    for ($i = 1; $i <= read_attribute_number(); $i++) {

                        $attribiut = read_attribute_ByNumber("attribiute_value", $i);

                        $value = $_POST["$attribiut"];

                        $student = array("student_name" => $_SESSION["student_name"], "customer_name" => $_SESSION["username"]);

                        insert_AttributeInStudent($attribiut, $value, $student);
                    }
                
                    
                    $birth = read_StudentAtribute("birth");
                    echo $birth ;
                    altersklasse_update($birth);

                ?>
                   <meta http-equiv="refresh" content="0; URL = kunden_bereich.php" />
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