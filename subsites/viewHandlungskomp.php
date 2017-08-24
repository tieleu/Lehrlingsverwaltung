<!DOCTYPE html>
<html>
<?php 
include("header.php");
$user = $_GET['user'];
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/handlungskompetenz.css">
	<link rel="stylesheet" type="text/css" href="../css/hkSideNav.css" />
	<script type="text/javascript" src="../js/viewHk.js"></script>
	<script type="text/javascript" src="../js/hkSideNav.js"></script>

	<title>viewHandlungskomptenz</title>
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
$hkid = $_GET['hkid'];
$queryResultHK = mysqli_query($db, "SELECT * FROM Handlungskompetenz WHERE kompetenz_ID=$hkid");
$queryResultBerPraxis = mysqli_query($db, "SELECT * FROM BeruflichePraxis WHERE kompetenz_IDFK=$hkid");
$queryResultSchule = mysqli_query($db, "SELECT * FROM Berufsfachschule WHERE kompetenz_IDFK=$hkid");
$queryResultUeK = mysqli_query($db, "SELECT * FROM UeKurs WHERE kompetenz_IDFK=$hkid");
$hk = array();
$BerPraxis = array();
$Schule = array();
$UeK = array();

while ($row = mysqli_fetch_object($queryResultHK)) {
	$hk["titel"] = $row -> titel;
	$hk["beschreibung"] = $row -> beschreibung;
	$hk["methodenkomp"] = $row -> methodenkompetenz;
	$hk["sozialkomp"] = $row -> sozialkompetenz;
	$hk["selbstkomp"] = $row -> selbstkompetenz;
	$hk["semester"] = $row -> semester;
}

while ($row = mysqli_fetch_object($queryResultBerPraxis)) {
	$temp = array();
	$temp['ordnungszeichen'] = $row -> ordnungszeichen;
	$temp['inhalt'] = $row -> inhalt;
	$temp['id'] = $row -> bpraxis_ID;
	$BerPraxis[] = $temp;
}

while ($row = mysqli_fetch_object($queryResultSchule)) {
	$temp = array();
	$temp['ordnungszeichen'] = $row -> ordnungszeichen;
	$temp['inhalt'] = $row -> inhalt;
	$Schule[] = $temp;
}
while ($row = mysqli_fetch_object($queryResultUeK)) {
	$temp = array();
	$temp['ordnungszeichen'] = $row -> ordnungszeichen;
	$temp['inhalt'] = $row -> inhalt;
	$UeK[] = $temp;
}
?>
<div id="main">

	<table class="table table-bordered">
		<thead>
			<tr>
				<th colspan="4"><?= $hk['titel']; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="4"><?= $hk['beschreibung']; ?></td>
			</tr>
			<tr>
				<th colspan="2">Methodenkompetenz</th>
				<th>Sozialkompetenz</th>
				<th>Selbstkompetenz</th>
			</tr>
			<tr>
				<td colspan="2"><?= $hk['methodenkomp']; ?></td>
				<td><?= $hk['sozialkomp']; ?></td>
				<td><?= $hk['selbstkomp']; ?></td>
			</tr>
			<tr>
				<th>Berufliche Praxis</th>
				<th><button class="btn" id="beurteilungBtn">Zur Selbstbeurteilung</button></th>
				<th>Berufsfachschule</th>
				<th>Überbetriebliche Kurse</th>
			</tr>
			<?php
				for ($i=0; $i < count($BerPraxis) ; $i++) {
					$querySelbstBeurt = mysqli_query($db, "SELECT sb_value FROM Selbstbeurteilung WHERE user_IDFK=$idUser AND bpraxis_IDFK=".$BerPraxis[$i]['id']);

					echo "<tr><td>".$BerPraxis[$i]['ordnungszeichen'].": ".$BerPraxis[$i]['inhalt']."</td>";
					echo "<td>".(mysqli_num_rows($querySelbstBeurt) == 1 ? mysqli_fetch_object($querySelbstBeurt) -> sb_value : '')."</td>";
					echo "<td>".$Schule[$i]['ordnungszeichen'].": ".$Schule[$i]['inhalt']."</td>";
					echo "<td>".$UeK[$i]['ordnungszeichen'].": ".$UeK[$i]['inhalt']."</td></tr>";
				}
			?>
		</tbody>
	</table>

</div>

<form method="post">
<div id="selbstbeurteilung">
	
	<div class="btn divButton" id="closeSb">&#9587;</div>
	<h3>Selbstbeurteilung der Beruflichen Praxis zur Handlungskompetenz <?= substr($hk['titel'],0,2); ?></h3>
	<table class="table table-border table-hover">
		<thead>
			<tr>
				<th>Berufliche Praxis</th>
				<th>++</th>
				<th>+</th>
				<th>-</th>
				<th>--</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for ($i = 0; $i < count($BerPraxis); $i++) {
					echo "<tr><td>".$BerPraxis[$i]['ordnungszeichen'].": ".$BerPraxis[$i]['inhalt']."</td>";
					?>
						<td>
							<input type="radio" name="beurt<?= $i ?>" value="++" checked>
						</td>
						<td>
							<input type="radio" name="beurt<?= $i ?>" value="+">
						</td>
						<td>
							<input type="radio" name="beurt<?= $i ?>" value="-">
						</td>
						<td>
							<input type="radio" name="beurt<?= $i ?>" value="--">
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
	<div class="btn divButton" id="btnNext">Weiter</div>
</div>
<div id="projects">
	<div class="btn divButton" id="closeProjects">&#9587;</div>
	<h3>Projekte zur Handlungskompetenz <?= substr($hk['titel'],0,2); ?></h3>
	<input type="text" name="" value="" placeholder="">
	<input type="submit" name="" value="submit">
</div>
</form>
<?php var_dump($_POST); ?>
</body>
</html>