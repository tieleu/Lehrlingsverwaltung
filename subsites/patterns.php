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
<body>
		<div id="patternNav">
			<a href="#factoryPattern">Factory Pattern</a>
			<a href="#strategyPattern">Strategy Pattern</a>
			<br>
			<a href="#header">nach oben <i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
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
					<img id="strategyUml" class="umlCursor" src="../image/patterns/strategy/strategy_uml.jpg" alt="strategy pattern uml diagram">
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

			<h3 id="builderPattern">Builder Pattern</h3>
			<div id="wrappBuilder">
				<div class="wrappCode" id="codeBuilder1">
					<img id="builderUml" class="umlCursor" src="../image/patterns/builder/builder_uml.jpg" alt="builder_pattern_uml">
					<h4>Step 1</h4>
					<p>Create a Class of the Object to build -> Room.java</p>
					<img src="../image/patterns/builder/builder_1_1.jpg">
					<img src="../image/patterns/builder/builder_1_2.jpg">
					<img src="../image/patterns/builder/builder_1_3.jpg">
					<img src="../image/patterns/builder/builder_1_4.jpg">
				</div>
				<div class="wrappCode" id="codeBuilder2">
					<h4>Step 2</h4>
					<p>Create the Builder Class which Bilds an Object of our previous created Class</p>
					<img src="../image/patterns/builder/builder_2_1.jpg">
					<img src="../image/patterns/builder/builder_2_2.jpg">
					<h4>Step 3</h4>
					<p>Eine Main Klasse erstellen welche ein Builder Objekt macht und das Objekt mit dem Builder Vorbereitet. Danach die Build methode ausführt und ein Objekt bekommt.</p>
					<img src="../image/patterns/builder/builder_3.jpg">
					<p>Ein Codebeispiel zur Implementierung gibt es <a href="../data/patterns/builderRoomBeispiel.zip">hier</a></p>
				</div>
				
			</div>

		</div>
</body>
</html>