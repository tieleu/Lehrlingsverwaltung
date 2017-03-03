 <!DOCTYPE html>
<html>
    <?php 
include("header.php");
$user = $_GET['user'];
?>
    <head>

     <link rel="stylesheet" type="text/css" href="../css/einstellungen.css">
     <script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>

    	<title>Lehrverwaltung - Einstellungen</title>
    	
    </head>
    <body>
<div id="wrappSettings">
    <div id="userOptions">
    	<form action="../phpAction/changePasswordAction.php?user=<?php echo $nameOfUser ?>" method="post">
        <div id="passwortChange">
            <label for="old" class="labelforPW">Altes Passwort <input class="form-control inputPW" type="password" name="old" value="" placeholder="altes Passwort" required="true"></label>
            <label for="new1" class="labelforPW">Neues Passwort <input class="form-control inputPW" type="password" name="new1" value="" placeholder="neues Passwort" required="true"></label>
            <label for="new2" class="labelforPW">Passwort bestätigen <input class="form-control inputPW" type="password" name="new2" value="" placeholder="Passwort bestätigen" required="true">
            <button id="chpwButton" name="chpwButton" class="btn">Passwort ändern</button></label>
        </div>
        </form>
    </div>

    <div id="userDelete">
    	
    </div>

	<div id="uebungCreate">
    	
    </div>

	<div id="uebungDelete">
    	
    </div>
</div>

    </body>
    </html>   