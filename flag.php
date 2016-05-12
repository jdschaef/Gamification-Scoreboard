
<!DOCTYPE HTML>
<html>
<head>
<div style="text-align:center;"><a href="http://scoreboard.ddns.net"><img src="banner2_1.jpg" align="center" alt="Hacker Banner" width="900px" height="200px"></a></div>
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
         <li class="SEComp"><a href="SEComp.html">SEComp</a></li>
	<li class="Future"><a href="future.html">Future</a></li>
        </ul>
    </div>
<br>

<br>
<div style="text-align:center; font-size:30px">
<form name="Flags" method="post">
<label for="teamname">Team Name: </label><br>
<input name="teamname" id="teamname"><br/><br>
<label for="flag">Flag: </label><br>
<input name="flag" id="flag"><br><br>
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
$result = mysql_query("SELECT * FROM scores WHERE teamname = '$teamn'");

$flag = $_POST['flag'];
$flag = mysql_real_escape_string($flag);
$result2 =mysql_query("SELECT * FROM flags WHERE flag = '$flag'"); 

$level = mysql_query("SELECT id FROM flags WHERE flag = '$flag'");
$row = mysql_fetch_assoc($level);
$id = $row['id'];
$value = "level" . $id;

$pass = mysql_query("select * from levels l JOIN scores s ON l.id = s.id WHERE teamname = '$teamn'");
$cleared = mysql_fetch_array($pass);
$cleared = $cleared[$value];

if (mysql_num_rows($result) > 0 and mysql_num_rows($result2) > 0){
        if($cleared == '0'){
	$retval = mysql_query("UPDATE scores SET score = score + 10 WHERE teamname = '$teamn'", $server);
	$update = mysql_query("UPDATE levels l JOIN scores s ON l.id = s.id SET $value = '1' WHERE teamname = '$teamn'", $server);
	if(!$retval)
	{
  	die('Could not update data: ' . mysql_error());
	}
	echo "Updated data successfully\n";
	header("Location: http://scoreboard.ddns.net/");

        }
	else {
        echo "<br><p align='center'>You have already completed this challenege. Stop trying to cheat or whatever....</p>";
	}

    }
else
    {
    echo "<p align='center'>Team name or flag not found!</p>";
 
    echo "<p align='center'>Might try typing it in again, or it might just be wrong....</p>";
    }
}
else {
print "Database NOT Found.";
mysql_close($db_handle);
}

}

?>


</body>
</html>

