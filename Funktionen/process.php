<?php
require("read.php");
require("insert.php");

function course_available($course)
{
    echo "test";
    $StudentAltersklasse = read_StudentAtributeByOrderId($_SESSION["id"], "altersklasse");
    echo $StudentAltersklasse;
    echo "test2";

    if (read_PListBySName($course, "ak1") == 1) {
        if ($StudentAltersklasse == 1) {
            return TRUE;
        }
    }
    if (read_PListBySName($course, "ak2") == 1) {
        if ($StudentAltersklasse == 2) {
            return TRUE;
        }
    }
    if (read_PListBySName($course, "ak3") == 1) {
        if ($StudentAltersklasse == 3) {
            return TRUE;
        }
    }
    if (read_PListBySName($course, "ak4") == 1) {
        if ($StudentAltersklasse == 4) {
            return TRUE;
        }
    }
    if (read_PListBySName($course, "ak5") == 1) {
        if ($StudentAltersklasse == 5) {
            return TRUE;
        }
    }
    return FALSE;
}


function calculate_altersklassen($days)
{

    if ($days <= read_altersklasse_ById(1)) {
        return 1;
    }

    if ($days <= read_altersklasse_ById(2)) {
        return 2;
    }

    if ($days <= read_altersklasse_ById(3)) {
        return 3;
    }

    if ($days <= read_altersklasse_ById(4)) {
        return 4;
    }

    if ($days <= read_altersklasse_ById(5)) {
        return 5;
    }
}

function altersklasse_update($birth)
{

    $today = date("Y-m-d");
    $age_days = round(abs(strtotime($today) - strtotime($birth)) / (60 * 60 * 24));
    $ak = calculate_altersklassen($age_days);
    $ak_number = strval($ak);
    $ak_name = "ak" . $ak_number;


    $summe = 0;
    for ($i = 1; $i <= read_attribute_number(); $i++) {
        $attribiute_name = read_attribute_ByNumber("attribiute_value", $i);
        $value = read_StudentAtribute($attribiute_name);
        $month = read_characteristics_nameByIdValue($i, $value, $ak_name);

        $summe = $summe + $month;
    }

    if ($summe > 6) {
        $summe = 6;
    }

    $days_diff = $summe * 31;
    $days = $age_days + $days_diff;
    $ak_new = calculate_altersklassen($days);
    $student = array("student_name" => $_SESSION["student_name"], "customer_name" => $_SESSION["username"]);
    insert_AttributeNumberInStudent2("age", $age_days, $student);
    insert_AttributeNumberInStudent2("altersklasse", $ak_new, $student);
}

function date_week($time_intervall, $dayofweek, $hour)
{
    //SO: 0 Mo:1 Di:2 Mi:3 ....

    switch ($time_intervall) {
        case 0:
            $begin = strtotime("07-06-2022");
            $end = strtotime("18-06-2022");
            break;
        case 1:
            $begin = strtotime("19-06-2022");
            $end = strtotime("27-07-2022");
            break;
        case 2:
            $begin = strtotime("28-07-2022");
            $end = strtotime("10-09-2022");
            break;
    }
    for ($i = 0; $i <= 6; $i++) {
        if (date('w', $begin + $i * 60 *60 * 24) == $dayofweek) {
            $start_day = $begin + $i * 60 *60 * 24;
        }
    }
    $i_date = $start_day;
    while($i_date <= $end) {
        $id = $_SESSION["id"];
        $date_new = date('Y-m-d', $i_date);
        $hours_start = date('H:i:s', ($hour - 1 ) * 60 * 60);
        $hours_end = date('H:i:s', ($hour - 1 )* 60 * 60 + 1 * 60 * 60);
        $check = read_date($id, $date_new, $hours_start, $hours_end);
        if ($check == 0) {
            insert_date($id, $date_new, $hours_start, $hours_end);
        }

        $i_date = $i_date + 7 * 24 * 60 * 60;
    }

}


function date_day($i, $date)
{
    $date_in_sec = strtotime($date);
    $hours_in_sec_start = ($i - 1) * 60 * 60;

    $date_new = date('Y-m-d', $date_in_sec);
    $hours_start = date('H:i:s', $hours_in_sec_start);
    $hours_end = date('H:i:s', $hours_in_sec_start + 1 * 60 * 60);
    $id = $_SESSION["id"];
    $check = read_date($id, $date_new, $hours_start, $hours_end);
    if ($check == 0) {
        insert_date($id, $date_new, $hours_start, $hours_end);
    }
}

function date_holiday($date_start, $date_end)
{
    $date_start_in_days = strtotime($date_start) / (60 * 60 * 24);
    $date_end_in_days = strtotime($date_end) / (60 * 60 * 24);

    for($i = $date_start_in_days; $i <= $date_end_in_days; $i++) {
        for($j = 10; $j <= 18; $j++){
            $date_in_sec = $i * 24 * 60 * 60;
            $hours_in_sec_start = ($j -1) * 60 * 60;

            $id = $_SESSION["id"];
            $date_new = date('Y-m-d', $date_in_sec);
            $hours_start = date('H:i:s', $hours_in_sec_start);
            $hours_end = date('H:i:s', $hours_in_sec_start + 1 * 60 * 60);

            $check = read_date($id, $date_new, $hours_start, $hours_end);
            if ($check == 0) {
                insert_date($id, $date_new, $hours_start, $hours_end);
            }
        }
    }
}

function date_revers()
{
 
    $start_saison = strtotime("07-06-2022"); #Saisonstart
    $end_saison = strtotime("10-09-2022"); #Saisonende
    $hour_start = strtotime("10:00:00"); #Tagbeginn
    $hour_end = strtotime("18:00:00"); #Tagende

    for($i = $start_saison; $i <= $end_saison; $i = $i + 24 * 60 *60) {
        for($j = $hour_start; $j <= $hour_end; $j = $j + 60 *60){

            $id = $_SESSION["id"];
            $date_new = date('Y-m-d', $i);
            $hours_start = date('H:i:s', $j);
            $hours_end = date('H:i:s', $j+ 1 * 60 * 60);

            $check = read_date($id, $date_new, $hours_start, $hours_end);
            if ($check == 0) {
                $check_a = read_date_a($id, $date_new, $hours_start, $hours_end);
                echo $date_new;
                if ($check_a == 0) {
                    insert_date_a($id, $date_new, $hours_start, $hours_end);
                }
            }
        }
    }
}

function disable($table, $attribiute_name, $attribiute)
{
    $n =read_lengthByString($table, $attribiute_name, $attribiute);
    if($n == 0){
        return "disabled";        
    } else{
        return "";
    }

}

function dates_check($j, $student)
{
    if(read_orderTerminByNumber($j, $student) == 0) {
        return "nein";
    } else {
        return "ja";
    }
}

function cours_name($number, $student_name)
{
 $id = read_orderIdByNumber($number, $student_name);
 $s_name = read_formAttributeById("kurs", $id);
 $kurs = read_PListBySName($s_name, "name");
 return $kurs;
}


function cours_filter($kurs_id) {
    $StudentAltersklasse = read_StudentAtributeByOrderId($_SESSION["id"], "altersklasse");
    if(TRUE) {
       return TRUE;
    } else {
        return FALSE;
    }

}
?>
