<!DOCTYPE html>
<html>
<head>
    <?php
    include("header.php");
    $user = $_GET['user'];
    setcookie("username", $user, time() + 60, "/");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/testing-uebersicht.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <title>Lehrverwaltung - Testing-Übersicht</title>
</head>
<body>
<main>
    <div class="panel panel-default">
        <div class="panel-heading">
            <select onchange="myFunction(this.value, '<?= $user ?>')">
                <option value="gesamtuebersicht" selected>Gesamtübersicht</option>
                <optgroup></optgroup>
                <?php
                $selectTests = "SELECT * from test";
                $loadTests = mysqli_query($db, $selectTests);
                while ($row = mysqli_fetch_object($loadTests)) {
                    ?>
                    <option value=<?php echo $row->id; ?>><?php echo $row->testname; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="resultDiv">
        </div>
    </div>
</main>
<script type="text/javascript" src="../js/testing-uebersicht.js"></script>
</body>
</html>