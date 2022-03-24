<?php require("functions.php"); ?>
<?php require("process_functions.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Buchungen</title>
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
                <table>
                <tr><td><b>Name</b></td><td><b>Kurs</b></td><td><b>Nummer</b></td> <td><b>Termine eingtragen</b></td> </tr>
                    <?php

                    for ($i = 1; $i <= read_lengthByString("students", "customer_name", $_SESSION["username"]); $i++) {
                        $student = read_Students_ByCustomerNumber($i);
                        for($j =1; $j <= read_lengthByStringOrders("orders", "student_name", $student); $j++) {
      
                                ?>
                                <tr>  
								<td> <?php echo read_Students_ByCustomerNumber($i); ?> </td>  
								<td> <?php echo cours_name($j, 	$student); ?> </td> 
								<td> <?php echo $j; ?> </td> 
								<td> <?php echo dates_check($j, $student); ?> </td> 
								</tr>
                            
                                <?php
                            

                        }
                    }


                    ?>
                </table>

                <br>
                <br>

              <form action="buchungen.php" method="post" class="form">
                <input type="submit" class="theButton" name="zurueck" value="zurück" <?php ?>>
                </form>
            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['zurueck'])) {
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