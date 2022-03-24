<?php require(__DIR__. "/../Funktionen/all.php"); ?>

<?php
session_start();
if (isset($_SESSION["username"])) {
?>

    <html>

    <head>
        <title>Eltern</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <div class="grid align__item">
            Wilkommen <?php echo $_SESSION["username"]; ?>
            <div class="register">

                <form action=" eltern.php" method="post" class="form">

                    <h3>Anrede</h3>
                    <div class="form__field">
                        <input type="text" name="anrede" placeholder="Frau" />
                    </div>
					<h3>Vorname*</h3>
                    <div class="form__field">
                        <input type="text" name="vorname" placeholder="Monika" />
                    </div>
                    <h3>Nachname*</h3>
                    <div class="form__field">
                        <input type="text" name="nachname" placeholder="Mustermann" />
                    </div>
                    <h3>Straße*</h3>
                    <div class="form__field">
                        <input type="text" name="strasse" placeholder="Musterstraße" />
                    </div>					
                    <h3>Hausnummer*</h3>
                    <div class="form__field">
                        <input type="text" name="hausnummer" placeholder="98" />
                    </div>
                    <h3>Postleitzahl*</h3>
                    <div class="form__field">
                        <input type="text" name="postleitzahl" placeholder="88599" />
                    </div>
                    <h3>Ort*</h3>
                    <div class="form__field">
                        <input type="text" name="ort" placeholder="Musterstadt" />
                    </div>					
					<h3>Bundesland*</h3>
					<div class="box">
                        <select name="bundesland">
                            <option value="einmalzahlung">Baden-Württemberg</option>
							<option value="einmalzahlung">Bayern</option>
							<option value="einmalzahlung">Berlin</option>
							<option value="einmalzahlung">Brandenburg</option>
							<option value="einmalzahlung">Bremen</option>
							<option value="einmalzahlung">Hamburg</option>
							<option value="einmalzahlung">Hessen</option>
							<option value="einmalzahlung">Mecklenburg-Vorpommern</option>
							<option value="einmalzahlung">Niedersachsen</option>
							<option value="einmalzahlung">Nordrhein-Westfalen</option>
							<option value="einmalzahlung">Rheinland-Pfalz</option>
							<option value="einmalzahlung">Saarland</option>
							<option value="einmalzahlung">Sachsen</option>
							<option value="einmalzahlung">Sachsen-Anhalt</option>
							<option value="einmalzahlung">Schleswig-Holstein</option>
							<option value="einmalzahlung">Thüringen</option>                            
                        </select>
                    </div>
					<h3>Festnetznummer*</h3>
                    <div class="form__field">
                        <input type="text" name="festnetznummer" placeholder="0123456789" />
                    </div>
					<h3>Mobilnummer 1*</h3>
                    <div class="form__field">
                        <input type="text" name="mobilnumer1" placeholder="0123456789" />
                    </div>
					<h3>Mobilnummer 2</h3>
                    <div class="form__field">
                        <input type="text" name="mobilnummer2" placeholder="0123456789" />
                    </div>
					<h3>alternative E-Mail</h3>
                    <div class="form__field">
                        <input type="text" name="mail" placeholder="muster@mustermail.de" />
                    </div>
					<br>
					<h3>*PFLICHTFELD</h3>
					
                    <br>
                    <br>

                    <input name="submit" type="submit">
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (strlen($_POST["vorname"]) > 0 && strlen($_POST["nachname"]) > 0 && strlen($_POST["strasse"]) > 0 && 							strlen($_POST["hausnummer"]) > 0 && 	strlen($_POST["postleitzahl"]) > 0 && strlen($_POST["ort"]) > 0 && 						   strlen($_POST["bundesland"]) > 0 && strlen($_POST["festnetznummer"]) > 0 && 
						strlen($_POST["mobilnumer1"]) > 0) {
						
						$customer      = array(
							"username" => $_SESSION["username"],
                        	"anrede" => $_POST["anrede"],
                        	"vorname" => $_POST["vorname"],
                        	"nachname" => $_POST["nachname"],
                       		"strasse" => $_POST["strasse"],
                        	"hausnummer" => $_POST["hausnummer"],
							"postleitzahl" => $_POST["postleitzahl"],
                        	"ort" => $_POST["ort"],
							"bundesland" => $_POST["bundesland"],
                        	"festnetznummer" => $_POST["festnetznummer"],
							"mobilnumer1" => $_POST["mobilnumer1"],
                        	"mobilnummer2" => $_POST["mobilnummer2"],
							"mail" => $_POST["mail"]
                    );

						insert_parents($customer);
						update_angemeldet();
						
						?>
            				<meta http-equiv="refresh" content="0; URL=kunden_bereich.php" />
       					<?php
						
						
					} else {
						echo "Angaben nicht vollsändig, bitte überprüfen";
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
