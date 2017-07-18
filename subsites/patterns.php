<!DOCTYPE html>
<html>
<head>
	<?php
		include("header.php");
    	$user = $_GET['user'];
	?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/patterns.css">
	<script src="../js/patterns.js"></script>

	<title>patterns</title>
</head>
<body id="body">
		<div id="patternNav">
			<a href="#factoryPattern">Factory Pattern</a>
			<a href="#strategyPattern">Strategy Pattern</a>
		</div>
		
		<div id="wrappPatterns">
			<h3 id="factoryPattern">Factory Pattern</h3>
			<div id="wrappFactory">
				<div class="wrappCode" id="codeFactory1">
					<img src="../image/patterns/factory/factory_pattern_uml_diagram.jpg" alt="factory_pattern_uml">
					<h4>Step 1</h4>
					<p>Create an Interface -> Shape.java</p>
					<img src="../image/patterns/factory/factory_code_1.jpg" alt="factory_code_1">
					<h4>Step 2</h4>
					<p>Create concrete classes implementing the same interface</p>
					<img src="../image/patterns/factory/factory_code_2_1.jpg" alt="factory_code_2_1">
					<img src="../image/patterns/factory/factory_code_2_2.jpg" alt="factory_code_2_2">
					<img src="../image/patterns/factory/factory_code_2_3.jpg" alt="factory_code_2_3">
				</div>

				<div class="wrappCode" id="codeFactory2">
					<h4>Step 3</h4>
					<p>Create a Factory to generate object of concrete class based on given information</p>
					<img src="../image/patterns/factory/factory_code_3.jpg" alt="factory_code_3">
					<h4>Step 4</h4>
					<p>Use the Factory to get object of concrete class by passing an information such as type</p>
					<img src="../image/patterns/factory/factory_code_4.jpg" alt="factory_code_4">
					<h5>Step 5</h5>
					<p>Verify the output</p>
					<img src="../image/patterns/factory/factory_code_5.jpg" alt="factory_code_5">
					<p>Ein weiteres Codebeispiel mit einer abstract Class anstatt eines Interfaces gibt es <a href="../data/patterns/factoryAutoBeispiel.zip">hier</a></p>
				</div>
			</div>

			<hr>

			<h3 id="strategyPattern">Strategy Pattern</h3>
			<div id="wrappStrategy">
				<div class="wrappCode" id="codeStrategy1">
					<img id="strategyUml" src="../image/patterns/strategy/strategy_uml.jpg" alt="strategy pattern uml diagram">
					<h4>Step 1</h4>
					<p>Create an Interface -> FlyAbility.java</p>
					<img src="../image/patterns/strategy/strategy_code_1.jpg">
					<h4>Step 2</h4>
					<p>Create concrete classes implementing the same interface -> OperationAdd.java</p>
					<img src="../image/patterns/strategy/strategy_code_2_1.jpg">
					<br><br>
					<img src="../image/patterns/strategy/strategy_code_2_2.jpg">
				</div>
				<div class="wrappCode" id="codeStrategy2">
					<h4>Step 3</h4>
					<p>Create Context Class. -> Duck.java</p>
					<img src="../image/patterns/strategy/strategy_code_3.jpg">
					<h4>Step 4</h4>
					<p>Use the Context to see change in behaviour when it changes its Strategy. -> Main.java</p>
					<img src="../image/patterns/strategy/strategy_code_4.jpg">
				</div>
			</div>

			<hr>

		</div>
</body>
</html>