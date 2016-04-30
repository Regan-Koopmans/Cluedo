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

	<div class="page-header">
		<h1 style="font-size:100px" id="heading">CL<span style="color:red">U</span>EDO</h1>
		<p style="font-size:20px" id="subheading">The <span style="color:yellow">Classic</span> Mystery Game<p>
	</div>

	<h1 id="heading">SET<span style="color:red">U</span>P</h1>
	<br/>


	<div align="center">
		<label>Players : </label> <input id='numPlayers' type='number' min="1" max="1" value="1" onclick="playerInputs()" onblur="playerInputs()">
	</div>
	<?php
	connectToDatabase();
	populate_database();
	?>

	<form action="Main.php" method="post">
	<div id='players_login' class="container">
		<label for="player1_ID">Player Name:</label>
		<input class="form-control" name="player_ID" id="player_ID" type="text" />
		<br/>

		<select class="form-control" name="character" id='character'>
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
		<br>
		<div align="center">
			<input type="submit" value='Start' onclick="playerPages()" id='submit-button' class="btn btn-default">
		</div>
	</div>
	<br/>
	</form>
    </body>

	<div align='center'>
    	<img height='200px' src='scroll2.png'>
	</div>

<script>
<?php
function connectToDatabase() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	// Create connection
	$link = new mysqli($servername, $username, $password);

	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS CluedoDB") or die ("Database creation unsuccessful");
    mysqli_select_db($link, 'CluedoDB');

    return $link;
}

function populate_database(){
    $db = connectToDatabase();


	$a = mysqli_query($db,"CREATE TABLE IF NOT EXISTS Players	(
	id INT(1) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	playerName VARCHAR(255) NOT NULL UNIQUE,
	characterName VARCHAR(255) Not Null,
	currentlyPlaying BOOLEAN DEFAULT null,
	positionX INT(2) UNSIGNED,
	positonY INT(2) UNSIGNED 
	);
	");
	
	if ($a === false) {
	    die('Table Players creation failed: ' . htmlspecialchars($db->error));
	}

	$a = mysqli_query($db, "CREATE TABLE IF NOT EXISTS Cards (
	    card_id int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
	    name varchar(255) NOT NULL UNIQUE,
	    type varchar(255) NOT NULL,
	    id INT(1) unsigned,
	    FOREIGN KEY (id) REFERENCES Players(id)
	    );
	");
	if ($a === false) {
	    die('Table Cards creation failed: ' . htmlspecialchars($db->error));
	}

	$s = $db->prepare("INSERT INTO Cards (name, type) VALUES (?, ?)");
	if ($s === false) {
	    die('prepare() failed: ' . htmlspecialchars($db->error));
	}

	$a = $s->bind_param("ss", $card_name, $card_type);
	if ($a === false) {
	    die('bind_param() failed: ' . htmlspecialchars($s->error));
	}

	//Characters
	$card_name = "Colonel Mustard"; $card_type = "Character";
	$a = $s->execute();
	$card_name = "Mrs White"; $card_type = "Character";
	$a = $s->execute();
	$card_name = "Miss Peacock"; $card_type = "Character";
	$a = $s->execute();
	$card_name = "Miss Scarlett"; $card_type = "Character";
	$a = $s->execute();
	$card_name = "Professor Plum"; $card_type = "Character";
	$a = $s->execute();
	$card_name = "Reverend Green"; $card_type = "Character";
	$a = $s->execute();
	//Weapons
	$card_name = "Candlestick"; $card_type = "Weapon";
	$a = $s->execute();
	$card_name = "Icepick"; $card_type = "Weapon";
	$a = $s->execute();
	$card_name = "Poison"; $card_type = "Weapon";
	$a = $s->execute();
	$card_name = "Poker"; $card_type = "Weapon";
	$a = $s->execute();
	$card_name = "Revolver"; $card_type = "Weapon";
	$a = $s->execute();
	$card_name = "Shears"; $card_type = "Weapon";
	$a = $s->execute();
	//Locations
	$card_name = "Aula"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Biology Labs"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Tribecca"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "I.T. Building"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Mathematics"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Music"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Centenary"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "Library"; $card_type = "Location";
	$a = $s->execute();
	$card_name = "EMS"; $card_type = "Location";
	$a = $s->execute();
	
	$db->close();
}
?>
</script>
</html>