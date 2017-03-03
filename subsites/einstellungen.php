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
            <h2 align="center">Passwort ändern</h2>
            <label for="old" class="form-group form-inline labelforPW">Altes Passwort <input class="form-control inputPW" type="password" name="old" value="" placeholder="altes Passwort" required="true"></label>
            <label for="new1" class="form-group form-inline labelforPW">Neues Passwort <input class="form-control inputPW" type="password" name="new1" value="" placeholder="neues Passwort" required="true"></label>
            <label for="new2" class="form-group form-inline labelforPW">Passwort bestätigen <input class="form-control inputPW" type="password" name="new2" value="" placeholder="Passwort bestätigen" required="true">
            <button id="chpwButton" name="chpwButton" class="btn">Passwort ändern</button></label><br><br>
        </div>
        </form>
    </div>

    <div id="createUser">
        <h2>Benutzer erstellen</h2>
        <label for="vorname" class="form-group form-inline labelforPW">Vorname <input class="form-control inputPW" type="text" name="vorname" value="" placeholder="Max" required="true"></label>
        <label for="nachname" class="form-group form-inline labelforPW">Nachname <input class="form-control inputPW" type="text" name="nachname" value="" placeholder="Muster" required="true"></label>
        <label for="benutzername" class="form-group form-inline labelforPW">Benutzername <input class="form-control inputPW" type="text" name="benutzername" value="" placeholder="tiemus" required="true"></label>
        <div id="selectwrapper">
        <label for="status" class="form-group form-inline labelforPW">Status </label>
        <select  class="form-control labelforPW" name="status">
            <option selected>select Status</option>
            <option value="lehrling">Lehrling</option>
            <option value="lehrmeister">Lehrmeister</option>
        </select>
        </div>
        <label for="new1" class="form-group form-inline labelforPW">Neues Passwort <input class="form-control inputPW" type="password" name="new1" value="" placeholder="neues Passwort" required="true"></label>
            <label for="new2" class="form-group form-inline labelforPW">Passwort bestätigen <input class="form-control inputPW" type="password" name="new2" value="" placeholder="Passwort bestätigen" required="true"></label>
            <button id="createUserButton" name="creaUsrBtn" class="btn">Benutzer erstellen</button>

    </div>

    <!--<div id="userDelete">
    	
    </div>

	<div id="uebungCreate">
    	
    </div>

	<div id="uebungDelete">
    	
    </div>-->
</div>

    </body>
    </html>   