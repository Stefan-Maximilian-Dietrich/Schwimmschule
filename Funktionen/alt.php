<?php
require("login_info.php");

function add($name)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $sql = "INSERT INTO customer (username) VALUES ('$name')";

    if ($conection->query($sql) === TRUE) {
        echo "$name Erolgreich hinzugefügt";
    } else {
        echo "Hinzufügen gescheitert: $conection->error";
    }
}

function update_discount($discount, $id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    //$sql = "UPDATE form SET discount_total = $discount WHERE username = '$user'";
    $sql = "UPDATE form SET discount_total = $discount WHERE form.id = $id";


    $conection->query($sql);
}

function update_final_price($price, $id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }


    //$sql = "UPDATE form SET discount_total = $discount WHERE username = '$user'";
    $sql = "UPDATE form SET final_price = $price WHERE form.id = $id";


    $conection->query($sql);
}


function check($name1)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }



    $sql = "SELECT * FROM customer WHERE username = '$name1'";
    $res = $conection->query($sql);

    if ($res->num_rows > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}


function evaluate($n)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }


    $form_keys = array("id", "username", "favoritbad", "wertach", "missen", "leutkirch", "kurs", "zeitblock1", "zeitblock2", "b1u10", "b1u11", "b1u12", "b1u13", "b1u14", "b1u15", "b1u16", "b1u17", "b1u18", "b2u10", "b2u11", "b2u12", "b2u13", "b2u14", "b2u15", "b2u16", "b2u17", "b2u18", "einmalzahlung");
    $form = array();
    for ($i = 0; $i < count($form_keys); $i++) {
        $wert = getT("form", $_SESSION["id"], $form_keys[$i]);
        $componente = array($form_keys[$i] => $wert);
        $form = array_merge($form, $componente);
    }


    if ($form["einmalzahlung"] == "einmalzahlung" && duration() > 1) { //Bezahlung
        $einmal = 1;
    } else {
        $einmal = 0;
    }

    $b1 = $form["zeitblock1"];
    $b2 = $form["zeitblock2"];


    $baeder = array();
    for ($i = 1; $i <= getN("bad"); $i++) {
        $new = getS("bad", $i, "s_name");
        array_push($baeder, $new);
    }


    //

if ($n >= 2) {
    $alt1 = 0;
    $alt2 = 1;
} else {
    if($n == 1) {
        $alt1 = 1;
        $alt2 = 0;
    } else {
        $alt1 = 0;
        $alt2 = 0; 
    }
}


    $id = $_SESSION["id"];
    $b1u10  = $form["b1u10"];
    $b1u11  = $form["b1u11"];
    $b1u12  = $form["b1u12"];
    $b1u13  = $form["b1u13"];
    $b1u14  = $form["b1u14"];
    $b1u15  = $form["b1u15"];
    $b1u16  = $form["b1u16"];
    $b1u17  = $form["b1u17"];
    $b1u18  = $form["b1u18"];
    $b2u10  = $form["b2u10"];
    $b2u11  = $form["b2u11"];
    $b2u12  = $form["b2u12"];
    $b2u13  = $form["b2u13"];
    $b2u14  = $form["b2u14"];
    $b2u15  = $form["b2u15"];
    $b2u16  = $form["b2u16"];
    $b2u17  = $form["b2u17"];
    $b2u18  = $form["b2u18"];

    

    if (getP2(getK($_SESSION["id"])) == 1) {
        $sql = "INSERT INTO `price`(`id`, `alt1`, `alt2`, `b1`, `b2`, `b1u10`, `b1u11`, `b1u12`, `b1u13`, `b1u14`, `b1u15`, `b1u16`, `b1u17`, `b1u18`, `b2u10`, `b2u11`, `b2u12`, `b2u13`, `b2u14`, `b2u15`, `b2u16`, `b2u17`, `b2u18`, `einmal`) 
        VALUES ('$id', $alt1, $alt2, $b1, $b2, $b1u10, $b1u11, $b1u12, $b1u13, $b1u14, $b1u15, $b1u16, $b1u17, $b1u18, $b2u10, $b2u11, $b2u12, $b2u13, $b2u14, $b2u15, $b2u16, $b2u17, $b2u18, $einmal)";
    } else {
        $sql = "INSERT INTO `price`(`id`, `alt1`, `alt2`, `b1`, `b2`, `b1u10`, `b1u11`, `b1u12`, `b1u13`, `b1u14`, `b1u15`, `b1u16`, `b1u17`, `b1u18`, `b2u10`, `b2u11`, `b2u12`, `b2u13`, `b2u14`, `b2u15`, `b2u16`, `b2u17`, `b2u18`, `einmal`) 
        VALUES ('$id', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    }



    $conection->query($sql);
}

function istrue($x)
{
    if ($x) {
        return (1);
    } else {
        return (0);
    }
}

function getA($value)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM discount WHERE disc_name = '$value'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->disc;

}
function getB($value)
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
    $sql = "SELECT * FROM price WHERE id = $id";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$value;

}


function getP($value)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM price_list WHERE s_name = '$value'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->price;
}

function getP2($value)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM price_list WHERE s_name = '$value'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->discounts;
}

function getD($value)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM price_list WHERE s_name = '$value'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->duration;
}

function getK($id)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM form WHERE id = $id";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->kurs;
}

function getS($from, $i, $attribiute)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM $from WHERE id = $i ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}

function get_bath($i, $attribiute)
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
    $course = getK($id);
    $sql = "SELECT * FROM bad JOIN verfuegbar ON bad.s_name = verfuegbar.bath_name WHERE id = $i AND available = 1 AND course_name = '$course'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}

function getT($from, $id, $attribiute)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }


    $sql = "SELECT * FROM $from WHERE id = $id ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}

function getU($attribiute)
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

    $sql = "SELECT * FROM form JOIN price_list WHERE (form.kurs = price_list.s_name AND form.id = $id)";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}

function getN($value)
{ // Anzahl an einträgen Tabelle 
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT count(*) AS count1 FROM $value";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->count1;
}


function get_order_number($student_name, $custemor_name) {
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT count(*) AS count1 FROM orders WHERE student_name = '$student_name' AND customer_name = '$custemor_name'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->count1;
}

function get_order_id($custemor_name, $student_name, $number_orders) {
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM orders WHERE student_name = '$student_name' AND customer_name = '$custemor_name' AND number_orders = $number_orders";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->id;
}


function get($table, $where1, $where2, $attribiute)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM $table WHERE $where1 = '$where2'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}

function discount()
{
    $discount_arry = array("alt1", "alt2", "b1", "b2", "b1u10", "b1u11", "b1u12", "b1u13", "b1u14", "b1u15", "b1u16", "b1u17", "b1u18", "b2u10", "b2u11", "b2u12", "b2u13", "b2u14", "b2u15", "b2u16", "b2u17", "b2u18", "einmal");
    $discount = 0;
    for ($i = 1; $i <= count($discount_arry); $i++) {
        $discount = $discount + getB($discount_arry[$i]) * getA($discount_arry[$i]);
    }
    return $discount;
}

function calculate()
{
    update_discount(discount(), $_SESSION["id"]);
    update_final_price(onetime(), $_SESSION["id"]);
}

function price()
{
    return getP(getK($_SESSION["id"]));
}
function duration()
{
    return getD(getK($_SESSION["id"]));
}

function onetime()
{
    return price() * duration() * (1 - discount());
}
function monthly()
{
    return price() * (1 - discount());
}

?>