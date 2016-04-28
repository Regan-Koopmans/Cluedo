<?php session_start(); ?>
<html>
<?php
    if (!isset($_SESSION['playing'])) {
        $file_contents = "";
        foreach ($_POST as $key => $value) {
            $file_contents .= $value . "\n";
        }
        file_put_contents("gameBuffer.txt", $file_contents);
        $_SESSION['playing'] = true;
    }
?>
<head>
    <title>Cluedo - The Classic Mystery Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-2.2.3.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js" crossorigin="anonymous"></script>
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
    <ul class="dropdown-menu" >
        <li style='float : right'><a href="Players.php">View Players <span class='glyphicon glyphicon-pawn'></span></a></li>

<?php
    $weapons = ["Dagger","Rope","Revolver","Knife","Lead Pipe","Wrench","Candlestick","Horseshoe","Bat","Poison","Axe","Dumbbell","Trophy"];
    $characters = ["Miss Scarlet","Colonel Mustard","Mrs. White","Mr. Green","Mrs Peacock","Professor Plum"];
    $places = ["Library","IT Building", "Aula","Music Building","Maths Building","Biology Building","EMS Building","Tribecca"];

    $player_one = [5,6,"green",true];

    $current = 0;

    $playing = $player_one[2];

    if ($playing)
        echo "<li style='float : right'><a href='Accusation.php'>Make Accusation <span class='glyphicon glyphicon-user'></span></a></li>";

    echo "</ul>";
    echo "</div>";

    $lines = file("gameBuffer.txt",FILE_IGNORE_NEW_LINES);
    $pairs = array($lines,2);



    echo "<br><br>";
    echo "<div class='container' align='center' style='border: 5px outset #996600'>";
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
    echo "<div class='container' >";

        if ($playing) {

            echo "<div align='center' class='row' style='background-color: lightgreen; border-radius: 5px'>". $pairs[0][0] ." is playing ";
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
            echo "<br>";
            echo "<div id='moveButton'></div>";


            //Modal 
            echo "<div id='moveModal' class='modal fade' role='dialog'>";
                echo "<div class='modal-dialog'>";
                
                    echo "<div class='modal-content' style='background-color:white'>";
                        echo "<div class='modal-header'>";
                            echo "<h1>Movement</h1>";
                            echo "<h6>For player " . $pairs[0][$current] . "</h6>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                            echo "<h5>Please enter the movement you wish to make: </h5>";
                            echo "<form>";
                                echo "<label style='color:black' for='change_x'>Change in X: &nbsp;</label>";
                                echo "<input onblur='checkMovement()' onclick='checkMovement()' id='change_x' type='number'><br>";
                                echo "<label style='color:black' for='change_y'>Change in Y: &nbsp; </label>";
                                echo "<input onblur='checkMovement()' onclick='checkMovement()' id='change_y' type='number'><br><br>";
                                
                                echo "<div id='message'>";

                                echo "</div>";
                                echo "<br>";

                                echo "<input id='submit_button' type='submit' onclick='checkMovement()' value='Move'>";
                            echo "</form>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

            //

            echo "</div>";
            echo "<div class='row'>";
            echo "<div align='center' class='col-xs-12'>-</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div align='center' class='col-xs-6' style='border-radius: 20px; background-color: white; border: 1px solid black;'>";
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
                        echo "<button type='submit' onclick='accuse()' class='btn btn-danger'>Accuse! <span class='glyphicon glyphicon-user'></span> </button>";
                        echo "</form>";
                    echo "</div>";
            echo "<div align='center' class='col-xs-6' style='border-radius: 20px; background-color: white; border: 1px solid black;'>";

                echo "<u><h4>Turns</h4></u>";
                echo "<br>";
                echo "<button class='btn btn-primary' onclick='changeTurn()'>End Turn  <span class='glyphicon glyphicon-fast-forward'></span></button>";
                echo "<br><br>";
                echo "<p style='color:black'>Playing next: ". $pairs[0][$current+2] ."</p>";

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
<hr>
<div align='center'>
    <img height='200px' src='scroll2.png'>
</div>
</html>
