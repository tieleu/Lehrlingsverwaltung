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

	<title>Patterns</title>
</head>
<body>
		<div id="patternNav">
			<a href="#factoryPattern">Factory Pattern</a>
			<a href="#strategyPattern">Strategy Pattern</a>
			<a href="#builderPattern">Builder Pattern</a>
			<a href="#commandPattern">Command Pattern</a>
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
					<p>Create a Main Class which makes a Builder Object, prepares the Object with the Builder, execute the method and gets an Object.</p>
					<img src="../image/patterns/builder/builder_3.jpg">
					<p>You can find a code example for the implementation <a href="../data/patterns/builderRoomBeispiel.zip">here</a></p>
				</div>
				
			</div>

			<hr>
			<h3 id="commandPattern">Command Pattern</h3>
			<div id="wrappCommand">
				<div class="wrappCode" id="codeCommand1">
					<img id ="commandUml" class="umlCursor" src="../image/patterns/command/command_1_1.JPG">
					<h4>Step 1</h4>
					<p>Create an Interface -> Command.java</p>
					<img src="../image/patterns/command/command_1_2.JPG">
					<h4>Step 2</h4>
					<p>Create a Class and implement the Interface. The method has to print out "Do nothing." -> DoNothing.java</p>
					<img src="../image/patterns/command/command_1_3.JPG">
					<h4>Step 3</h4>
					<p>Create a Class what you want to control with the Remote and create methods for the functions of your device <br>-> Tv.java</p>
					<img src="../image/patterns/command/command_1_4.JPG">
				</div>
				<div class="wrappCode" id="codeCommand2">
					<h4>Step 4</h4>
					<p>Create seperate Classes for the On-function and Off-function and implement the Command interface on both Classes. -> TvIsOn.java, -> TvIsOff.java</p>
					<img src="../image/patterns/command/command_2_1.JPG">
					<br>
					<br>
					<img src="../image/patterns/command/command_2_2.JPG">
					<h4>Step 5</h4>3
					<p>Create a Class to make the possibillity to set commands and the push buttons. -> Remote.java</p>
					<img src="../image/patterns/command/command_2_3.JPG">
					<h4>Step 6</h4>
					<p>Create a Class to test the Remote. Execute it with the JUnit Test. -> RemoteTest.java</p>
					<img src="../image/patterns/command/command_2_4.JPG">
					<p>You can find the whole code example <a href="../data/patterns/CommandPatternBeispiel.zip">here</a></p>
				</div>
			</div>
			<hr>
		</div>
</body>
</html>