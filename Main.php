<?php
    session_start();
?>
<html>
<?php
        $lines = file("gameBuffer.txt",FILE_IGNORE_NEW_LINES);
        $pairs = array($lines,2);
        if (!isset($_SESSION['playing'])) {
            echo "<p>First time user!</p>";
            foreach ($pairs as $array) {
                file_put_contents("gameBuffer.txt", $pairs[0][0] . "\n" . $pairs[0][1]++);
            }
        }
    $_SESSION['playing'] = "1";
?>
<head>
    <title>Cluedo - The Classic Mystery Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="Cluedo.js"></script>
    <link rel="stylesheet" href="Cluedo.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Damion" />
</head>
<div class="page-header">
    <h1 style="font-size:100px" id="heading">CL<span style="color:red">U</span>EDO</h1>
    <p style="font-size:20px" id="subheading">The <span style="color:#ffff00">Classic</span> Mystery Game<p>
</div>

<div class="btn-group" style="align-content: right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Go <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="Players.php">View Players</a></li>

<?php
    echo "<script>alert('". $_POST['player1_ID'] ."')</script>";

    $weapons = ["Dagger","Rope","Revolver","Knife","Lead Pipe","Wrench","Candlestick","Horseshoe","Bat","Poison","Axe","Dumbbell","Trophy"];
    $characters = ["Miss Scarlet","Colonel Mustard","Mrs. White","Mr. Green","Mrs Peacock","Professor Plum"];
    $places = ["Library","IT Building", "Aula","Music Building","Maths Building","Biology Building","EMS Building","Tribecca"];

    $player_one = [5,6,"green",true];
    $player_two = [4,4];
    $player_three = [3,3];
    $player_four = [2,2];

    $playing = $player_one[2];

    if ($playing)
        echo "<li><a href='Accusation.php'>Make Accusation</a></li>";

    echo "</ul>";
    echo "</div>";

    $lines = file("gameBuffer.txt",FILE_IGNORE_NEW_LINES);
    $pairs = array($lines,2);

    if ($pairs[0][1] < 3)
        echo "<p>Wating for other players (Currently " . ($pairs[0][1]) . ")</p>";

    echo "<br>";
    echo "<div class='container' align='center'>";
    for ($x = 0; $x < 20; $x++) {
        echo "<div class='row' >";
        for ($y = 0; $y < 12; $y++) {
            if ($x == $player_one[0] && $y == $player_one[1]) {
                echo "<div class='col-xs-1' style='background-color: ".$player_one[2]."; color:black; border: 1px solid black; '>_</div>";
            } else if ($y >= 0 && $y < 3 && $x > 7 && $x < 10) {
                echo "<div class='col-xs-1' style='background-color: lightblue; color:black; border: 1px solid black'>LIBRARY</div>";
            } else if ($y >= 0 && $y < 3 && $x > 10 && $x < 13) {
                echo "<div class='col-xs-1' style='background-color: violet; color:black; border: 1px solid black'>MUSIC</div>";
            } else if ($y >= 9 && $y < 13 && $x > 7 && $x < 13) {
                echo "<div class='col-xs-1' style='background-color: plum; color:black; border: 1px solid black'>IT</div>";
            } else if ($y >= 4 && $y < 8 && $x >= 0 && $x < 6) {
                echo "<div class='col-xs-1' style='background-color: lightyellow; color:black; border: 1px solid black'>CENT</div>";
            } else if ($y >= 4 && $y < 8 && $x >= 15 && $x < 21) {
                echo "<div class='col-xs-1' style='background-color: lightcoral; color:black; border: 1px solid black'>AULA</div>";
            } else if (($y > 2 && $y < 9) || ($x > 5 && $x < 15)) {
                echo "<div class='col-xs-1' style='background-color: #d4d4d4; color:#d4d4d4; border: 1px solid black'>_</div>";
            } else if ($y < 3 && $x < 6) {
                echo "<div class='col-xs-1' style='background-color: peachpuff; color:black; border: 1px solid black'>MATH</div>";
            } else if ($y < 3 && $x < 6) {
                echo "<div class='col-xs-1' style='background-color: peachpuff; color:black; border: 1px solid black'>_</div>";
            } else if ($y < 3 && $x > 14) {
                echo "<div class='col-xs-1' style='background-color: rosybrown; color:black; border: 1px solid black'>BIO</div>";
            } else if ($y > 8 && $x < 6) {
                echo "<div class='col-xs-1' style='background-color: turquoise; color:black; border: 1px solid black'>EMS</div>";
            } else if ($y > 8 && $x > 14) {
                echo "<div class='col-xs-1' style='background-color: grey; color:black; border: 1px solid black'>TRIBE</div>";
            }
        }
        echo "</div>";
    }
    echo "</div>";
    echo "<br>/";
    echo "<div class='container'>";

        if ($playing) {

            echo "<div align='center' class='row' style='background-color: lightgreen; border-radius: 5px'> You are playing ";
            echo "</div>";
            echo "<br>";
            echo "<div class='row'>";
            echo "<div align='center' class='col-xs-6' 200px style='border-radius:10px; background-color: white; border: 1px solid black; height: 200px'>";
            echo "<u><h4>Cards</h4></u> <br><br>";
            echo "<div class='row' style='padding: 5px;'>";
            for ($x = 0; $x < 15; $x++) {
                echo " <div class='col-xs-1' style='background-color: gold; color: white; border-radius: 10%; width: 60px; padding: 5px'><b>Card</b></div> ";
            }
            echo "</div>";
            echo "</div>";
            echo "<div align='center' class='col-xs-6' style='background-color: white; border-radius:10px; border: 1px solid black; height: 200px'>";
            echo "<u><h4>Dice</h4></u> <br><br>";
            echo "<div class='row'>";

            echo "<div id='die1' class='col-xs-6' style='border-radius:10px; background-color: lightblue'>#</div>";
            echo "<div id='die2' class='col-xs-6' style='border-radius:10px; background-color: lightblue'>#</div>";
            echo "<div style='color:white'>_</div>";
            echo "</div>";

            echo "<button onclick='rollDice()' class='btn btn-default'>Roll Dice</button>";

            echo "</div>";
            echo "<div class='row'>";
            echo "<div align='center' class='col-xs-12'>-</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div align='center' class='col-xs-6' 200px style='border-radius: 20px; background-color: white; border: 1px solid black;'>";
            echo "<u><h4>Accusations</h4></u>";
            echo "<form>";
            echo "<br>";

            echo "<select class='form-control'>";
            foreach ($characters as $character) {
                echo "<option>";
                echo $character;
                echo "</option>";
            }
            echo "</select>";
            echo "<br>";
            echo "<select class='form-control'>";
            foreach ($places as $place) {
                echo "<option>";
                echo $place;
                echo "</option>";
            }
            echo "</select>";
            echo "<br>";
            echo "<select class='form-control'>";
            foreach ($weapons as $weapon) {
                echo "<option>";
                echo $weapon;
                echo "</option>";
            }
            echo "</select>";
            echo "<br>";
            echo "<div style='color:white'>_</div>";
            echo "<button type='submit' class='btn btn-danger'>Accuse!</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
        }
else {
    echo "<div align='center' class='row' style='background-color: lightcoral; border-radius: 5px'> It is not your turn";
    echo "<meta http-equiv='refresh' content='5;Main.php'>";
}
?>
</html>
