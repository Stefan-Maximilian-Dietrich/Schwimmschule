<?php
require("login_info.php");

function insert_id($id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO `form`(`id`) 
             VALUES ('$id')";

    $conection->query($sql);
}

function update_angemeldet()
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
	echo "test1.1";
    $username1 = $_SESSION["username"];
    $sql = "UPDATE customer SET angemeldet = 0 WHERE username = '$username1' ";

    $conection->query($sql);
	echo "test1.2";
}

function insert_kurs($kurs)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $id = $_SESSION["id"];
    $sql = "UPDATE form SET kurs = '$kurs' WHERE id = $id";

    $conection->query($sql);
}

function insert_favoritbad($bad)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $id = $_SESSION["id"];
    $sql = "UPDATE form SET favoritbad = '$bad' WHERE id = $id";
    $conection->query($sql);
}

function insert_discount_bad($discount_bad)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $keays = array_keys($discount_bad);

    $id = $_SESSION["id"];
    for ($i = 0; $i < count($discount_bad); $i++) {
        $keay = $keays[$i];
        $sql = "UPDATE form SET $keay = $discount_bad[$keay]  WHERE form.id = $id";
        $conection->query($sql);
    }
}

function insert_fav_bad($fav_bad)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }


    $id = $_SESSION["id"];

    $sql = "UPDATE form SET $fav_bad = 1  WHERE form.id = $id";
    $conection->query($sql);

}

function insert_discount_time($discount_time)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $keays = array_keys($discount_time);

    $id = $_SESSION["id"];
    for ($i = 0; $i < count($discount_time); $i++) {
        $keay = $keays[$i];
        $sql = "UPDATE form SET $keay = $discount_time[$keay]  WHERE form.id = $id";
        $conection->query($sql);
    }
}

function insert_bezahlung($bezahlung)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $id = $_SESSION["id"];
    $sql = "UPDATE form SET einmalzahlung = '$bezahlung'  WHERE id = $id";
    $conection->query($sql);
}

function insert_student($student)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $studentName = $student["name"];
    $customer_name = $student["customer_name"];
    $date_birth = $student["birth"];
    $student_number = $student["student_number"];



    $sql = "INSERT INTO `students` (`name`, `customer_name`, `birth`, `number`) VALUES ('$studentName', '$customer_name', '$date_birth', '$student_number');";

    $conection->query($sql);
}

function insert_parents($customer)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $username1 = $customer["username"];
    $anrede = $customer["anrede"];
    $vorname = $customer["vorname"];
    $nachname = $customer["nachname"];
	$strasse = $customer["strasse"];
    $hausnummer = $customer["hausnummer"];
    $postleitzahl = $customer["postleitzahl"];
    $ort = $customer["ort"];
	$bundesland = $customer["bundesland"];
    $festnetznummer = $customer["festnetznummer"];
    $mobilnumer1 = $customer["mobilnumer1"];
    $mobilnummer2 = $customer["mobilnummer2"];
	$mail = $customer["mail"];



    $sql = "INSERT INTO `custumer_data` (`username`, `anrede`, `vorname`, `nachname`, `strasse`, `hausnummer`, `postleitzahl`, 											 `ort`, `bundesland`, `festnetznummer`, `mobilnumer1`, `mobilnummer2` , `mail`) 
	VALUES ('$username1', '$anrede', '$vorname', '$nachname', '$strasse', '$hausnummer', '$postleitzahl','$ort', '$bundesland', 			'$festnetznummer', '$mobilnumer1', '$mobilnummer2', '$mail');";

    $conection->query($sql);
	

}

function insert_studentName($student_name)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $_SESSION["username"];
    $sql = "UPDATE form SET student_name = '$student_name' WHERE username = '$name'";

    $conection->query($sql);
}

function insert_order($customer_name, $student_name, $order_number)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO `orders` (`customer_name`, `student_name`, `number_orders`, `id`) VALUES ('$customer_name', '$student_name', $order_number, NULL);";

    $conection->query($sql);
}

function insert_sorder_time($id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $_SESSION["username"];
    $sql = "UPDATE orders SET time_checked = 1 WHERE id = $id";

    $conection->query($sql);
}

function insert_altersklasse($altersklasse, $student) 
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $student["student_name"];
    $customer = $student["customer_name"];

    $sql = "UPDATE students SET  altersklasse = $altersklasse WHERE student.name = '$name' AND customer_name = '$customer'";

    $conection->query($sql);
}

function insert_AttributeInStudent($attribute, $value, $student) 
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $student["student_name"];
    $customer = $student["customer_name"];

    $sql = "UPDATE `students` SET $attribute = '$value' WHERE `students`.`name` = '$name' AND `students`.`customer_name` = '$customer';";
    $conection->query($sql);
}

function insert_AttributeNumberInStudent($attribute, $value, $student) 
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $student["student_name"];
    $customer = $student["customer_name"];

    $sql = "UPDATE `students` SET $attribute = '$value' WHERE `students`.`name` = '$name' AND `students`.`customer_name` = '$customer';";
    $conection->query($sql);
}

function insert_AttributeNumberInStudent2($attribute, $value, $student) 
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $student["student_name"];
    $customer = $student["customer_name"];


    $sql = "UPDATE `students` SET `$attribute` = $value WHERE `students`.`name` = '$name' AND `students`.`customer_name` = '$customer';";
    $conection->query($sql);
}

function insert_date($id, $date, $time_start, $time_end)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO `customer_time` (`id`, `date`, `time_start`, `time_end`) VALUES ($id, '$date', '$time_start', '$time_end');";
    
    $conection->query($sql);
}

function insert_date_a($id, $date, $time_start, $time_end)
{
    global $severname;
    global $user;
    global $pw;
    global $db;
    
    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO `customer_available` (`id`, `date`, `time_start`, `time_end`) VALUES ($id, '$date', '$time_start', '$time_end');";
    
    $conection->query($sql);
}

function insert_Zoom_date($date, $username)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $name = $_SESSION["username"];
    $sql = "UPDATE customer SET zoom = '$date' WHERE username = '$username'";

    $conection->query($sql);
}

function insert_order_bad($order_id, $bad_id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO `order_bad` (`customer_id`, `bad_id`, `verfuegbar`, `favorit`) VALUES ($order_id, $bad_id, 0, 0);";

    $conection->query($sql);
}

function update_favorit($order_id, $bad_id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "UPDATE order_bad SET favorit = 1 WHERE customer_id = $order_id AND bad_id = $bad_id";

    $conection->query($sql);
}

function update_bad($order_id, $bad_id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "UPDATE order_bad SET verfuegbar = 1 WHERE customer_id = $order_id AND bad_id = $bad_id";

    $conection->query($sql);
}

?>