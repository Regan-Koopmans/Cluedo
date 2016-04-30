<?php session_start() ?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="Cluedo.css">
    <script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="Cluedo.js"></script>
    <title>Refutation</title>
</head>

<div class="page-header">
  <h1 style="font-size:100px" id="heading">CL<span style="color:red">U</span>EDO</h1>
  <p style="font-size:20px" id="subheading">The <span style="color:yellow">Classic</span> Mystery Game<p>
</div>

<p>Does any player have a card that denies this accusation?</p>

<div style='color:white; background-color:red' align='center'>
  <?php

    echo "<b> Character </b>: " . $_POST['character'];
    echo "<br>";
    echo "<b> Weapon </b>: " . $_POST['weapon'];
    echo "<br>";
    echo "<b>Location </b>: " . $_POST['place'];
    echo "<br>";
  ?>
</div>

<br><br>
<div class='container'>
  <div class='row'>
<?php
$lines = file("gameBuffer.txt",FILE_IGNORE_NEW_LINES);
$pairs = array($lines,2);

echo "<div align='center'>";
  for ($x = 0; 2*$x <  sizeof($pairs[0]); $x++)
    if ($pairs[0][2*$x] != $_SESSION['current_player'])
      echo "<a class='btn btn-default' href='Classified.php'>" . $pairs[0][2*$x] . "</a> &nbsp;";
echo "</div>";

?>
  </div>
</div>

<br><br>

<div align='center'>
  <button class='btn btn-info'>No one</button>
</div>

</html>
