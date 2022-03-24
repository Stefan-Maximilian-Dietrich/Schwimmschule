<?php //require(__DIR__. "/../Funktionen/all.php"); ?>
<?php
session_start();

?>

    <html>

    <head>
        <title>Termin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>


        <div class="grid align__item">
            <div class="register">

                <form action="termine2.php" method="post" class="form">


                <h3>Nächster Mittwoch 20:30</h3> <br>
                Am <?php echo date("d.m.Y", strtotime("30 March 2022")); ?>
                    <input type="submit" class="theButton" name="monday" value="anmelden" <?php ?>>

                <h3>Nächster Sonntag 20:30</h3> <br>
                Am <?php echo date("d.m.Y", strtotime("3 April 2022")); ?>

                    <input type="submit" class="theButton" name="wednesday" value="anmelden" <?php ?>>

                </form>
  
            </div>
        </div>
    </body>

    </html>
    <?php
    if (isset($_POST['monday'])) {
		insert_Zoom_date(date('Y-m-d',strtotime("30 March 2022")), $_SESSION["mail"]);
		$_SESSION["tag"] = date('Y-m-d',strtotime("30 March 2022"))
		?>
            <meta http-equiv="refresh" content="0; URL= zoom_erfolg.php" />
		<?php
    ?>
        
    <?php
    } elseif (isset($_POST['wednesday'])) {
		insert_Zoom_date(date('Y-m-d',strtotime("3 April 2022")), $_SESSION["mail"]);
		$_SESSION["tag"] = date('d.m.Y',strtotime("3 April 2022"))
    ?>
        <meta http-equiv="refresh" content="0; URL= zoom_erfolg.php" />
    <?php
    } 
    ?>