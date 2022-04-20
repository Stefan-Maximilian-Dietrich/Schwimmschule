<?php require(__DIR__ . "/../Funktionen/all.php"); ?>
<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION["username"] == "Alfred.Hartmann") {
    $connect = mysqli_connect("localhost", "admin1", "l6$1Bp6g", "Schwimmschule"); 
    $sql = "SELECT * FROM customer"; 
    $result = mysqli_query($connect, $sql);

?>

    <html>

    <head>
        <title>Kunden in Datenbnk</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <br />
            <br />
            <br />
            <div class="table-responsive">
                <h2 align="center">Kunden in Datenbank</h2><br />
                <table class="table table-bordered">
                    <tr>
                        <th>Mail</th>
                        <th>Mobilnummer</th>
                        <th>Zoom-Datum</th>
                        <th>angemeldet</th>
                    </tr>
                    <?php
                    $n = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $n = $n + 1;
                        echo '  
       <tr>  
         <td>' . $row["username"] . '</td>  
         <td>' . $row["mobil"] . '</td>  
         <td>' . $row["zoom"] . '</td>  
         <td>' . $row["angemeldet"] . '</td>  
       </tr>  
        ';
                    }
                    echo "Es befinden sich ". $n . " Kundeneinträge in der Datenbank.";
                    ?>
                </table>
                <br />
                <form method="post" action="export.php">
                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                </form>
                <form action="anzeigen.php" method="post" class="form">
                <input type="submit" class="btn btn-success" name="zurueck" value="zurück" <?php ?>>
                </form>
            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['zurueck'])) {
    ?>
        <meta http-equiv="refresh" content="0; URL = backoffice.php" />
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