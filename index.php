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
	 <li class="SEComp"><a href="SEComp.html">SEComp</a></li>
	<li class="Future"><a href="future.html">Future</a></li>
	</ul>
    </div>
<br>

<table border="2" align="center" width="400" height ="900">
<thead>
<tr style= "font-size:35px;">
<th style="width:500px">Logo</th>
<th style="width:500px">Team</th>
<th>Score</th>
</tr>
</thead>


 <?php

$server = mysql_connect("localhost","root", "guestguest");
$db =  mysql_select_db("scoreboard",$server);
$query = mysql_query("select * from scores ORDER BY score DESC");


    while ($row = mysql_fetch_array($query)) {
     if($row[score] > 9){ 
       echo "<tr>";
       echo "<td align='center'><img src='b.png' align='center' alt='Hacker Banner' width='50px' height='50px'></td>";
       echo "<td align='center'><p style='font-size:25px'>".$row[teamname]."</p></td>";
       echo "<td align='center'><p style='font-size:25px'>".$row[score]."</p></td>";
       echo "</tr>";
     }
    }
?>
</table>

<br>
<br>
<div align="center">
<form action="http://scoreboard.ddns.net/newteam.php">
    <input type="submit" style="font-size:30px" value="Create A New Team">
</form>
</div>
<br>
<br>

</body>

</html>
