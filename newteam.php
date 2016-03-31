<!DOCTYPE HTML>
<html>
<head>
<div style="text-align:center;"><img src="banner2_1.jpg" align="center" alt="Hacker Banner" width="900px" height="200px"></div>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body bgcolor="DEE7EF">
<br>


<div class="nav">
      <ul>
        <li class="Home"><a href="index.php">Home</a></li>
        <li class="About"><a href="about.html">About</a></li>
        <li class="Launch"><a href="launch.html">Launch</a></li>
	<li class="Downloads"><a href="download.html">Downloads</a></li>
        <li class="Flags"><a href="flag.php">Flags</a></li>
        <li class="Future"><a href="future.html">Future</a></li>
        </ul>
    </div>
<br>

<br>



<div style="text-align:center; font-size:30px">
<form name="create" method="post">
<label for="teamname">Team Name: </label><br>
<input name="teamname" id="teamname"><br/><br>
<label for="score">Score: </label><br>
<input name="score" id="score"><br><br>
<input type="submit" value="Submit" name="submit" id="submit" style="width:120px; height:60px; font-size:30px">
</form>
</div>



<?php
if(isset($_POST['submit'])){

$server = mysql_connect("localhost","root", "guestguest");
$db_found = mysql_select_db("scoreboard", $server);

if ($db_found) {
$teamn = $_POST['teamname'];
$teamn = mysql_real_escape_string($teamn);

$score = $_POST['score'];

if(empty($score)){
	if (empty($teamn)) {
    		echo '<p align="center">Your Team Name is empty, or not set at all... Might be a good idea to actually fill this out...</p>';
	}
	else
	{    
		mysql_query("INSERT INTO scores (teamname, score) VALUES ('$teamn', 0);");
    		mysql_query("INSERT INTO levels (level1, level2, level3, level4, level5, level6, level7, level8, level9, level10) VALUES (0,0,0,0,0,0,0,0,0,0);");
		header("Location: http://scoreboard.ddns.net/");
	}

}
else{
 echo '<p align="center">Your Score should be set to zero.... Talk about an entitlement generation....</p>';
}
}
}
?>




</body>
</html>
