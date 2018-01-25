<!DOCTYPE html>
<html>
<?php 
include("header.php");
$user = $_GET['user'];
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/hkSideNav.css" />
	<link rel="stylesheet" type="text/css" href="../css/handlungskompetenz.css" />
	<script type="text/javascript" src="../js/hkSideNav.js"></script>

	<title>Handlungskompetenzen</title>
</head>
<body>
<?php
	$hkompSelect = mysqli_query($db, "SELECT * FROM Handlungskompetenz ORDER BY titel");
	$hkompTitel[] = array();
	$hkompSem[] = array();
	while ($row = mysqli_fetch_object($hkompSelect)) {
		$hkompTitel[] = $row -> titel;
		$hkompSem[] = $row -> semester;
	}

	#var_dump($hkompTitel);
?>

</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=all">Alle</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=1">1. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=2">2. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=3">3. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=4">4. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=5">5. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=6">6. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=7">7. Semester</a>
  <a href="handlungskompetenz.php?user=<?php echo $user; ?>&sem=8">8. Semester</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<?php
	$sem = $_GET['sem'];
?>
<div id="main">

<table class="table" id="hkTable">
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
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=1"><?= ($sem == 'all' || $sem == $hkompSem[1] ? $hkompTitel[1] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=2"><?= ($sem == 'all' || $sem == $hkompSem[2] ? $hkompTitel[2] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=3"><?= ($sem == 'all' || $sem == $hkompSem[3] ? $hkompTitel[3] : ''); ?></a></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>B</td>
			<td>Entwickeln von Applikationen unter Berücksichtigung von Qualitätsmerkmalen</td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=4"><?= ($sem == 'all' || $sem == $hkompSem[4] ? $hkompTitel[4] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=5"><?= ($sem == 'all' || $sem == $hkompSem[5] ? $hkompTitel[5] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=6"><?= ($sem == 'all' || $sem == $hkompSem[6] ? $hkompTitel[6] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=7"><?= ($sem == 'all' || $sem == $hkompSem[7] ? $hkompTitel[7] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=8"><?= ($sem == 'all' || $sem == $hkompSem[8] ? $hkompTitel[8] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=9"><?= ($sem == 'all' || $sem == $hkompSem[9] ? $hkompTitel[9] : ''); ?></a></td>
		</tr>
		<tr>
			<td>C</td>
			<td>Aufbauen und Pflegen von Daten sowie von deren Strukturen</td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=10"><?= ($sem == 'all' || $sem == $hkompSem[10] ? $hkompTitel[10] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=11"><?= ($sem == 'all' || $sem == $hkompSem[11] ? $hkompTitel[11] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=12"><?= ($sem == 'all' || $sem == $hkompSem[12] ? $hkompTitel[12] : ''); ?></a></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>D</td>
			<td>Inbetriebnahme von ICT-Geräten</td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=13"><?= ($sem == 'all' || $sem == $hkompSem[13] ? $hkompTitel[13] : ''); ?></a></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>E</td>
			<td>Arbeiten in Projekten</td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=14"><?= ($sem == 'all' || $sem == $hkompSem[14] ? $hkompTitel[14] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=15"><?= ($sem == 'all' || $sem == $hkompSem[15] ? $hkompTitel[15] : ''); ?></a></td>
			<td><a href="viewHandlungskomp.php?user=<?php echo $user; ?>&hkid=16"><?= ($sem == 'all' || $sem == $hkompSem[16] ? $hkompTitel[16] : ''); ?></a></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
</div>

</body>
</html>