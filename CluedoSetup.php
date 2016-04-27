<?php
	session_destroy();
	session_start();
	$_SESSION['playing'] = null;
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	  	<link rel="stylesheet" href="Cluedo.css">
		<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="Cluedo.js"></script>
		<title>Cluedo Setup</title>
    </head>
    <body>

	<h1 id="heading"> Setup </h1>
	<br/>

	<div align="center">
		<label>Number of Players</label> <input id='numPlayers' type='number' min="1" max="6" value="1" onclick="playerInputs()" onblur="playerInputs()">
	</div>

	<form action="Main.php" method="post">
	<div id='players_login' class="container">
		<label for="player1_ID">Player Name:</label>
		<input class="form-control" id="player_ID" type="text" />
		<br/>

		<select class="form-control" name="character">
			<?php
			$characters = ["Miss Scarlet","Colonel Mustard","Mrs. White","Mr. Green","Mrs Peacock","Professor Plum"];

			foreach ($characters as $character)
			{
			echo "<option>";
				echo $character;
				echo "</option>";
			}
			?>
		</select>
	</div>
	<br/>

	<div align="center">
		<input type="submit" class="btn btn-default">Start</input>
	</div>
	</form>

    </body>
</html>
