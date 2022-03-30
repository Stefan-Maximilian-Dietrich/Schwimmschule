<?php
require("login_info.php");


function read_PListBySName($s_name, $attribiute)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM price_list WHERE s_name = '$s_name' ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribiute;
}


function read_StudentAtributeByOrderId($id, $attribiute)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM orders WHERE id = $id ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $customer_name = $object->customer_name;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM orders WHERE id = $id ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $student_name = $object->student_name;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }



    $sql = "SELECT * FROM students WHERE students.name = '$student_name' AND customer_name = '$customer_name' ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->$attribiute;


    return $result;
}

function read_StudentAtribute($attribiute)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
   

    $student_name = $_SESSION["student_name"];
    $customer_name= $_SESSION["username"];

    $sql = "SELECT * FROM students WHERE students.name = '$student_name' AND customer_name = '$customer_name' ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->$attribiute;



    return $result;
}

function check_angemeldet()
{


    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $username1 = $_SESSION["username"];

    $sql = "SELECT * FROM customer WHERE username = '$username1'  ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->angemeldet;



    return $result;
}

function read_orderIdByNumber($number, $student_name)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
   

    $customer_name= $_SESSION["username"];

    $sql = "SELECT * FROM orders WHERE student_name = '$student_name' AND customer_name = '$customer_name' AND number_orders = $number ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->id;



    return $result;
}

function read_orderTerminByNumber($number, $student_name)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
   

    $customer_name= $_SESSION["username"];

    $sql = "SELECT * FROM orders WHERE student_name = '$student_name' AND customer_name = '$customer_name' AND number_orders = $number ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->time_checked;



    return $result;
}


function read_TableAttributeById($table, $attribiute, $idname, $id)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
   


    $sql = "SELECT * FROM $table WHERE $idname = '$id'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->$attribiute;



    return $result;
}


function read_orderAttributeById($attribiute, $id)
{

    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
   


    $sql = "SELECT * FROM orders WHERE student_name = $id";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $result = $object->$attribiute;



    return $result;
}

function read_formAttributeById($attribiute, $id)
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
    $result = $object->$attribiute;



    return $result;
}

function read_StudentByID($id) {
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM orders WHERE id = $id ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $customer_name = $object->customer_name;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM orders WHERE id = $id ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    $student_name = $object->student_name;

    return array("student_name" => $student_name, "customer_name" => $customer_name);
}

function read_attribute_number() {
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT max(attribiute_nr) AS 'maximum' FROM discret_attribiute ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->maximum;
}

function read_characteristics_numberByID($i)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT max(characteristics_nr) AS 'maximum' FROM discret_attribiute WHERE attribiute_nr = $i";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->maximum;
}

function read_characteristics_nameByIDJd($i, $j)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM discret_attribiute WHERE attribiute_nr = $i AND characteristics_nr = $j";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->characteristics_name;
}

function read_characteristics_nameByIdValue($i, $value, $ak)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM discret_attribiute WHERE attribiute_nr = $i AND characteristics_value = '$value' ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$ak;
}

function read_characteristics_valueByIDJd($i, $j)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM discret_attribiute WHERE attribiute_nr = $i AND characteristics_nr = $j";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->characteristics_value;
}

function read_attribute_ByNumber($attribiute, $i)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM discret_attribiute WHERE attribiute_nr = $i AND characteristics_nr = 1 ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();

    return $object->$attribiute;
}

function read_attribute($attribute, $table, $attribute_nr, $characteristics_nr)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM $table WHERE  attribute_nr = $attribute_nr AND characteristics_nr = $characteristics_nr";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->$attribute;
}

function read_altersklasse_ById($i)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT * FROM altersklassen WHERE ak = $i ";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->days_top;
}

function read_date($id, $date, $time_start, $time_end)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT count(*) AS n FROM customer_time WHERE id = $id AND customer_time.date =  '$date' AND time_start =  '$time_start' AND time_end =  '$time_end'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->n;
}

function read_date_a($id, $date, $time_start, $time_end)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT count(*) AS n FROM customer_available WHERE id = $id AND customer_available.date =  '$date' AND time_start =  '$time_start' AND time_end =  '$time_end'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->n;
}



function read_lengthByString($tabel, $attribiute_name, $attribiute)
{ // Anzahl an einträgen Tabelle 
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }
    $sql = "SELECT count(*) AS count1 FROM $tabel WHERE $attribiute_name = '$attribiute'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->count1;
}

function read_lengthByStringOrders($tabel, $attribiute_name, $attribiute)
{ // Anzahl an einträgen Tabelle 
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $customer_name = $_SESSION["username"];
    $sql = "SELECT count(*) AS count1 FROM $tabel WHERE $attribiute_name = '$attribiute' AND customer_name = '$customer_name'";
    $res = $conection->query($sql);
    $object = $res->fetch_object();
    return $object->count1;
}

function read_Students_ByCustomerNumber($i)
{
    global $severname;
    global $user;
    global $pw;
    global $db;

    $conection = new mysqli($severname, $user, $pw, $db);
    if ($conection->connect_error) {
        die("Verbindunsfehler: $conection->connect_error");
    }

    $username = $_SESSION["username"];


    $sql = "SELECT * FROM students WHERE customer_name = '$username' AND students.number = $i";
    $res = $conection->query($sql);
    $object = $res->fetch_object();

    return $object->name;
}

function print_table()
{    
	global $severname;
    global $user;
    global $pw;
    global $db;
	
	$con = mysqli_connect($severname, $user, $pw, $db);
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($con,"SELECT * FROM customer");

    while($row = mysqli_fetch_array($result))
      {
      echo $row['username'] . " " . $row['zoom']; //these are the fields that you have stored in your database table employee
      echo "<br />";
      }

    mysqli_close($con);
    
}

function get_bath($i, $attribiute) {
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



?>