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
<br>
<?php
$ausgabe = "select * from Uebung";
$ergebniss = mysql_query($ausgabe);
while ($row = mysql_fetch_object($ergebniss)) {
?>
<div id= "zeile">
<tr id="zeile">
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> name?>" readonly></td>
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> Thema?>" readonly></td>
    <td><input type="text" class="form-control" placeholder="<?php  echo $row-> Vorraussetzung?>" readonly></td>
    <td><a href="<?php  echo $row-> Link ?>">zur Übung</a></td>
</tr>
</div>

<?php } ?>

   </table>
 
   </div>


    </body>
    </html> 