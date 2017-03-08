    <!DOCTYPE html>
    <html>
    <head>
        <?php 
            include("header.php");
         ?>
   
  
     <link rel="stylesheet" type="text/css" href="../css/uebung.css">

    	<title>Lehrverwaltung - Übungen</title>
    	
    </head><br>
  
    <body>
    <div id="uebungliste">
   <table class="table table-hover">


   <tr>
    <th>Name der Übung:</th>
    <th>Thema:</th>
    <th>Vorraussetzung:</th>
    <th>Link zur Übung:</th>
  </tr>
    <tr>
        <td><input type="text" class="form-control" value="Neue Übung erstellen" readonly></td>
        <td><button class="btn" id="createUebungBtn">+</button></td>
        <td></td>
        <td></td>
    </tr>

<?php
$ausgabe = "select * from Uebung";
$ergebniss = mysql_query($ausgabe);
while ($row = mysql_fetch_object($ergebniss)) {
?>
<div class="zeile">
<tr class="zeile">
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> name?>" readonly></td>
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> Thema?>" readonly></td>
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> Vorraussetzung?>" readonly></td>
    <td><a href="<?php  echo $row-> Link ?>">zur Übung</a></td>
</tr>
</div>

<?php } ?>

   </table>
   <div id="createUebung" class="overlayHidden">
       <button id="close">close</button>
   </div>
 
   </div>


    </body>
    </html> 