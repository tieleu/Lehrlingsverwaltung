<?php 
include("../db/db_connection.php");
$value = $_POST["chooseTest"];
$user = $_GET["user"];

function getLeaderboard($db, $value) {
		$selectTestresult= "SELECT vorname, MAX(testresult) AS testresult FROM javafile
  		inner JOIN testresult t on javafile.id = t.javafile_idfs
  		INNER JOIN User U on javafile.user_idfs = U.idUser
  		INNER JOIN status s on t.status_idfs = s.id
  		WHERE test_idfs=$value
		GROUP BY vorname
		ORDER BY testresult DESC";

		$executeTestresult = mysqli_query($db, $selectTestresult);
		if (mysqli_num_rows($executeTestresult) > 0) {
		echo "<div class ='leaderboardTable'><table align='center'>";
		$counter =0;
		$highestResult =0;
			while ($row = mysqli_fetch_array($executeTestresult)) {
				
				if ($counter == 0) {
					$highestResult = $row['testresult'];
				}
				$widhOfProgressbar=  (100 / $highestResult) * $row['testresult'];
				$counter++;
				echo "<tr>";
				echo "<td valign='top'><b>" . $row['vorname'] . ":</b></td>";
				echo "<td class='result'><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow=$row[testresult] aria-valuemin='0' aria-valuemax='$highestResult' style='width:$widhOfProgressbar%'>" ."<b>" .$row['testresult'] . "</b>"  . "</div></div></td>";
				echo "</tr>";
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