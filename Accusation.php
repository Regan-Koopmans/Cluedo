<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-2.2.3.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"  crossorigin="anonymous"></script>
    <script src="Cluedo.js"></script>
    <link rel="stylesheet" href="Cluedo.css">
</head>

<div class="page-header">
    <h1 style="font-size:100px" id="heading">CL<span style="color:red">U</span>EDO</h1>
    <p style="font-size:20px" id="subheading">The <span style="color:#ffff00">Classic</span> Mystery Game<p>
</div>
</html>

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Go <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li style='float:right'><a href="Main.php">Return to Game <span class='glyphicon glyphicon-th'></span> </a></li>
        <li style='float:right'><a href="Players.php">View Players <span class='glyphicon glyphicon-pawn'></span> </a></li>
    </ul>
</div>
<?php

$weapons = ["Dagger","Rope","Revolver","Knife","Lead Pipe","Wrench","Candlestick","Horseshoe","Bat","Poison","Axe","Dumbell","Trophy"];
$characters = ["Miss Scarlet","Colonel Mustard","Mrs. White","Mr. Green","Mrs Peacock","Professor Plum"];
$places = ["Library","IT Building", "Aula","Music Building","Maths Building","Biology Building","EMS Building","Tribecca"];

echo "<div class='row'>-</div>";
echo "<div class='container'";
echo "<div class='row'>";
echo "<div align='center' class='col-xs-12' style='border-radius: 20px; background-color: white; border: 1px solid black;'>";
echo "<u><b><h3>Accusations</h3></b></u>";
echo "<form>";
echo "<br>";

echo "<select class='form-control'>";
foreach ($characters as $character)
{
    echo "<option>";
    echo $character;
    echo "</option>";
}
echo "</select>";

echo "<br>";

echo "<select class='form-control'>";
foreach ($places as $place)
{
    echo "<option>";
    echo $place;
    echo "</option>";
}
echo "</select>";
echo "<br>";

echo "<select class='form-control'>";
foreach ($weapons as $weapon)
{
    echo "<option>";
    echo $weapon;
    echo "</option>";
}
echo "</select>";
echo "<br>";
echo "<div style='color:white'>_</div>";
echo "<button type='submit' onclick='accuse()' class='btn btn-danger'>Accuse!  <span class='glyphicon glyphicon-user'></span></button>";
echo "</form>";
echo "</div>";
echo "</div>";
?>