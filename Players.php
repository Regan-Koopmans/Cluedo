<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="Cluedo.js"></script>
    <link rel="stylesheet" href="Cluedo.css">
</head>

<div class="page-header">
    <h1 style="font-size:100px" id="heading">CL<span style="color:red">U</span>EDO</h1>
    <p style="font-size:20px" id="subheading">The <span style="color:#ffff00">Classic</span> Mystery Game<p>
</div>

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Go <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="Main.php">Back to Game</a></li>
        <li><a href="Accusation.php">Make Accusation</a></li>
    </ul>
</div>
<div class="row">
    -
</div>
<div class="container" style="background-color: white; border-radius: 10px">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Character</th>
            </tr>
        </thead>
<?php


$players = ["regan" => "mustard","tester" => "mrs white", "hi" => "lol"];

foreach ($players as $player => $character)
{
    echo "<tr>";
        echo "<td>" . $player . "</td>";
        echo "<td>" . $character . "</td>";
    echo "</tr>";
}

?>
    </div>
</table>
</html>