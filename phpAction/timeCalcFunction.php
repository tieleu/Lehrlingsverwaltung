<?php

function zeitZuDez($time)
{
    $floatTime = str_replace(':', '.', $time);
    $min = substr($floatTime, 3);
    $stund = substr($floatTime, 0, 2) * 60;
    $dezmin = 100 / 60 * $min / 100;
    $dezZeit = $stund + $min;
    return $dezZeit;
}

function minToTime($time)
{
    $rest = $time % 60;
    $hours = ($time - $rest) / 60;
    if ($hours < - 9) {
        $hours = $hours / - 1;
    } else if ($hours < 0) {
        $hours = 0 . $hours / - 1;
    } else if ($hours < 10) {
        $hours = 0 . $hours;
    }
    if ($rest < (- 9)) {
        $rest = $rest / - 1;
        $hours = "-" . $hours;
    } else if ($rest < 0) {
        $rest = 0 . ($rest / (- 1));
        $hours = "-" . $hours;
    } else if ($rest < 10) {
        $rest = 0 . $rest;
    }
    return $hours . ":" . $rest;
}

function totalColor($exact_solltime, $totalTime)
{
    $totcolor = "";
    if ($totalTime - $exact_solltime < 0) {
        $totcolor = "#E53427";
    } else {
        $totcolor = "#3FB13F";
    }
    return $totcolor;
}

function getCurrentDifference($workedTime)
{
    global $db;
    global $idUser;
    
    if ($workedTime == 0) {
        $date = date("Y-m-d");
        $dateplus = date('Y-m-d', strtotime($date . ' +1 day'));
        $select = mysqli_query($db, "SELECT id, user_id, date_format(zeit, '%H:%i') AS zeit, date_format(zeit, '%Y-%m-%d') AS datum FROM zeit WHERE zeit>='$date' AND zeit<'$dateplus' AND user_id= $idUser ORDER BY zeit desc");
        $actualTime = date("H:i");
        $timeTotal = 0;
        $array = array();
        
        $array[] = $actualTime;
        while ($row1 = mysqli_fetch_object($select)) {
            $array[] = $row1->zeit;
        }
        for ($i = 0; $i < count($array); $i ++) {
            if ($i % 2 == 0) {
                $timeTotal += zeitZuDez($array[$i]);
            } else {
                $timeTotal -= zeitZuDez($array[$i]);
            }
        }
        return $timeTotal;
    } else {
        return $workedTime;
    }
}
?>