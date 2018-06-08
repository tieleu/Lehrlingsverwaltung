<?php 
include("../db/db_connection.php");
$value = $_POST["chooseTest"];
$user = $_GET["user"];

function getLeaderboard($db, $value) {
	$selectRowOfUsers= mysqli_query($db, "SELECT idUser FROM User");
	$rowsOfUsers= mysqli_num_rows($selectRowOfUsers);
	$testresultArray = array();
	
	for ($i=0; $i < $rowsOfUsers; $i++) {
		$idOfUser =0;
		$selectUser= "SELECT idUser from User LIMIT " . $i . ",1";
		$findId = mysqli_query($db, $selectUser);
		while ($row = mysqli_fetch_object($findId)) {
			$idOfUser = $row -> idUser;
		}

		$selectTestresult= "SELECT testresult FROM testresult
  		JOIN status ON status.id = status_idfs
  		JOIN javafile ON testresult.javafile_idfs = javafile.id
  		JOIN test ON javafile.test_idfs = test.id
  		WHERE javafile.user_idfs= $idOfUser AND javafile.test_idfs = $value AND status_idfs =1
		ORDER BY testresult DESC 
		LIMIT 1";

		$executeTestresult = mysqli_query($db, $selectTestresult);
		if (mysqli_num_rows($executeTestresult) > 0) {
			while ($row = mysqli_fetch_object($executeTestresult)) {
				array_push($testresultArray, $row -> testresult);
			}
		}
	}
	rsort($testresultArray);
echo "<div class ='leaderboardTable'><table align='center'>";

	for ($i=0; $i < count($testresultArray); $i++) { 
	$selectLeaderboard = "SELECT vorname FROM User
  	JOIN javafile j ON User.idUser = j.user_idfs
  	JOIN test t ON j.test_idfs = t.id
  	JOIN testresult t2 ON j.id = t2.javafile_idfs
  	JOIN status s ON t2.status_idfs = s.id
  	WHERE testresult = $testresultArray[$i] AND test_idfs = $value";

	$executeLeaderboard = mysqli_query($db, $selectLeaderboard);
	if (mysqli_num_rows($executeLeaderboard)> 0) {
		while ($row = mysqli_fetch_array($executeLeaderboard)) {
			$widhOfProgressbar=  (100 / $testresultArray[0]) * $testresultArray[$i];
		echo "<tr>";
		echo "<td valign='top'><b>" . $row['vorname'] . ":</b></td>";
		echo "<td class='result'><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow=$testresultArray[$i] aria-valuemin='0' aria-valuemax='$testresultArray[0]' style='width:$widhOfProgressbar%'>" . $testresultArray[$i] . "</div></div></td>";
		echo "</tr>";
		}
	}
}
echo "<table></div>";
}

if (!empty($value)) {
switch ($value) {
	case 'auswahl':
		echo "Bitte einen Test auswählen";
		break;
	default:
		getLeaderboard($db, $value);
		break;
	}
}
?>