<!DOCTYPE html>
<html>
<?php 
include("header.php");
$user = $_GET['user'];
?>
<head>
	<title>Handlungskompetenzen</title>
</head>
<body>
<?php
	$hkompSelect = mysqli_query($db, "SELECT * FROM Handlungskompetenz ORDER BY titel");
	$hkompTitel[] = array();
	while ($row = mysqli_fetch_object($hkompSelect)) {
		$hkompTitel[] = $row -> titel;
	}

	#var_dump($hkompTitel);
?>

<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>Handlungskompetenzbereich</th>
			<th>Berufliche Handlungskompetenz</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>A</td>
			<td>Erfassen, Interpretieren und darstellen von Anforderungen für Applikationen</td>
			<td><?= $hkompTitel[1]; ?></td>
			<td><?= $hkompTitel[2]; ?></td>
			<td><?= $hkompTitel[3]; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>B</td>
			<td>Entwickeln von Applikationen unter Berücksichtigung von Qualitätsmerkmalen</td>
			<td><?= $hkompTitel[4]; ?></td>
			<td><?= $hkompTitel[5]; ?></td>
			<td><?= $hkompTitel[6]; ?></td>
			<td><?= $hkompTitel[7]; ?></td>
			<td><?= $hkompTitel[8]; ?></td>
			<td><?= $hkompTitel[9]; ?></td>
		</tr>
		<tr>
			<td>C</td>
			<td>Aufbauen und Pflegen von Daten sowie von deren Strukturen</td>
			<td><?= $hkompTitel[10]; ?></td>
			<td><?= $hkompTitel[11]; ?></td>
			<td><?= $hkompTitel[12]; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>D</td>
			<td>Inbetriebnahme von ICT-Geräten</td>
			<td><?= $hkompTitel[13]; ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>E</td>
			<td>Arbeiten in Projekten</td>
			<td><?= $hkompTitel[14]; ?></td>
			<td><?= $hkompTitel[15]; ?></td>
			<td><?= $hkompTitel[16]; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
	

</body>
</html>