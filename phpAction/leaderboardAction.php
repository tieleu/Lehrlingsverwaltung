<?php
include("../db/db_connection.php");
$value = $_POST["chooseTest"];
$user = $_GET["user"];

function getLeaderboard($db, $value)
{
    $selectTestresult = "SELECT vorname, MAX(testresult) AS testresult FROM javafile
  		inner JOIN testresult t on javafile.id = t.javafile_idfs
  		INNER JOIN User U on javafile.user_idfs = U.idUser
  		INNER JOIN status s on t.status_idfs = s.id
  		WHERE test_idfs=$value
		GROUP BY vorname
		ORDER BY testresult DESC";

    $executeTestresult = mysqli_query($db, $selectTestresult);
    if (mysqli_num_rows($executeTestresult) > 0) {
        echo "<div class ='leaderboardTable'><table align='center'>";
        $counter = 0;
        $highestResult = 0;
        while ($row = mysqli_fetch_array($executeTestresult)) {

            if ($counter == 0) {
                $highestResult = $row['testresult'];
            }
            $widhOfProgressbar = (100 / $highestResult) * $row['testresult'];
            $counter++;
            echo "<tr>";
            echo "<td valign='top'><b>" . $row['vorname'] . ":</b></td>";
            echo "<td class='result'><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow=$row[testresult] aria-valuemin='0' aria-valuemax='$highestResult' style='width:$widhOfProgressbar%'>" . "<b>" . $row['testresult'] . "</b>" . "</div></div></td>";
            echo "</tr>";
        }
    }
    echo "<table></div>";
}

function getGesamtuebersicht($db)
{
    $SelectRowsOfUser = mysqli_query($db, "SELECT idUser from User");
    $SelectRowsOfTests = mysqli_query($db, "SELECT id from test");
    $rowsOfUser = mysqli_num_rows($SelectRowsOfUser);
    $rowsOfTests = mysqli_num_rows($SelectRowsOfTests);
    $firstnameOfUser = "";
    $gesamtuebersichtArray = array();

    for ($indexOfUser = 0; $indexOfUser < $rowsOfUser; $indexOfUser++) {
        $points = 0;
        $selectUser = "SELECT vorname from User limit $indexOfUser, 1";
        $executeSelectUser = mysqli_query($db, $selectUser);
        while ($row = mysqli_fetch_object($executeSelectUser)) {
            $firstnameOfUser = $row->vorname;
        }
        for ($indexOfTest = 0; $indexOfTest < $rowsOfTests; $indexOfTest++) {
            $idOfTest = "";
            $selectTest = "SELECT id from test limit $indexOfTest, 1";
            $executeSelectTest = mysqli_query($db, $selectTest);

            while ($row = mysqli_fetch_object($executeSelectTest)) {
                $idOfTest = $row->id;
            }

            $leaderboardResults = "SELECT vorname, MAX(testresult) AS testresult FROM javafile
  		  INNER JOIN testresult t on javafile.id = t.javafile_idfs
  		  INNER JOIN User U on javafile.user_idfs = U.idUser
  		  INNER JOIN status s on t.status_idfs = s.id
  		  WHERE test_idfs=$idOfTest
		  GROUP BY vorname
		  ORDER BY testresult DESC";

            $executeLeaderboardResults = mysqli_query($db, $leaderboardResults);
            $rowsOfLeaderboards = mysqli_num_rows($executeLeaderboardResults);
            if ($rowsOfLeaderboards > 0) {
                $counter = -1;
                while ($row = mysqli_fetch_object($executeLeaderboardResults)) {
                    $counter++;
                    if ($row->vorname === $firstnameOfUser) {
                        $points += $rowsOfLeaderboards - $counter;
                    }
                }
            }
        }
        $gesamtuebersichtArray["$firstnameOfUser"] = $points;
    }
    arsort($gesamtuebersichtArray);

    echo "<div class='leaderboardTable'><table align='center'>";
    $highestResult = reset($gesamtuebersichtArray);
    foreach ($gesamtuebersichtArray as $vorname => $punkte) {
        $widthOfProgressbar = (100 / $highestResult) * $punkte;
        if ($punkte !== 0) {
            echo "<tr>";
            echo "<td valign='top'><b>" . $vorname . ":</b></td>";
            echo "<td class='result'><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow=$punkte aria-valuemin='0' aria-valuemax='$highestResult' style='width:$widthOfProgressbar%'>" . "<b>" . $punkte . "</b>" . "</div></div></td>";
            echo "<tr>";
        }
    }
    echo "</table></div>";

}

if (!empty($value)) {
    switch ($value) {
        case 'auswahl':
            echo "Bitte einen Test auswählen";
            break;
        case 'gesamtuebersicht':
            getGesamtuebersicht($db);
            break;
        default:
            getLeaderboard($db, $value);
            break;
    }
}
?>