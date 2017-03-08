    <!DOCTYPE html>
    <html>
    <head>
        <?php 
            include("header.php");
         ?>
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script type="text/javascript" src="../js/uebungen.js"></script>
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
   <div id="createUebung" class="overlayHidden" align="center">
        <h2 align="center">Übung erstellen</h2>
        <label for="uebungsname" class="form-group form-inline labelforPW">Übungsname <input class="form-control inputPW" type="text" name="uebungsname" value="" placeholder="name" required="true"></label>       
        <div class="selectwrapper" width="500px">
        <label for="thema" class="form-group form-inline labelforPW">Thema 
        <select  class="form-control labelforPW" name="thema" id="selectTopic">
            <option selected>select Thema</option>
            <option value="java">Java</option>
            <option value="html">HTML</option>
            <option value="php">PHP</option>
            <option value="sonstiges">Sonstiges</option>
        </select></label>
        </div>
        <label for="voraussetzung" class="form-group form-inline labelforPW">Voraussetzung <input class="form-control inputPW" type="text" name="voraussetzung" value="" placeholder="name" required="true"></label>
       <button id="close">close</button>

   </div>
 
   </div>


    </body>
    </html> 