<html>

<head>
 <?php 
include("header.php");
 ?>
  <link rel="stylesheet" type="text/css" href="../css/zurpruefung.css">
  
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="author" content="Hege Refsnes">

	<title>Lehrlingsverwaltung - Aufgaben Prüfen</title>
</head>
<body>
<table class="table">
 <tr>
    <th>Lehrling</th>
    <th>Übung:</th>
    <th>Kommentar:</th>
  <th>zur Prüfung:</th>
  </tr>


<?php

$ausgabe = "SELECT a.User_idUser,a.uebung,a.komentar,a.idAufgaben, u.vorname from Aufgaben a, User u where a.pruefen = 1 AND a.User_idUser = u.idUser";
$ergebniss = mysql_query($ausgabe);
while ($row = mysql_fetch_object($ergebniss)) {
  $id = $row -> idAufgaben;
?>


<tr class="success">
   <td><input readonly type="text" class="form-control"  placeholder="<?php  echo $row-> vorname ?>"></td>
  <form action="../phpAction/prüfen.php?user=<?php echo $nameOfUser?>" method="post">

 <td hidden ><input readonly type="text" class="form-control"  name="userID"  value="<?php echo $id?>" placeholder="<?php  echo $row-> uebung?>"></td>

  <td><input readonly type="text" class="form-control"  placeholder="<?php  echo $row-> uebung?>"></td>

  <td><input readonly type="text" class="form-control" placeholder="<?php  echo $row-> komentar?>"></td>

  <td><button name="erfüllt" id="pruefungsButton"  type="submit" style="width: 100px; height: 30px;">erfüllt</button>
      <button name="nichtErfüllt" id="pruefungsButton"  type="submit" style="width: 100px; height: 30px;">nicht erfüllt</button></td>
  </form>
  
   <?php } ?>
  </tr>





  </table>
<footer id="footer">
</footer>

			</body>
		</html>
