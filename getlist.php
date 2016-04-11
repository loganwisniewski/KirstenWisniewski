<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Kirsten Wisniewski</title>
<link rel="stylesheet" type="text/css" href="/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body style="background:none">

<?php

	require('bin/db_conn.php');
	
	$sql = "SELECT qty FROM rsvp";
	$result = mysql_query($sql, $link);	
	
	$qty = 0;
	
	while ($row = mysql_fetch_assoc($result)) {
		$qty = $qty + $row["qty"];
	}
	
	
?>

<div id="total">
<a href="https://p3nlmysqladm002.secureserver.net/grid55/197/index.php?token=13575bb6b3294bdc2f5e261ac64fcaa9&db=kirsten" target="_blank">

<span style="font-size:125px; font-weight:600"><?php echo $qty?></span><span style="font-size:75px; font-weight:300"> People!</span>

</a>
</div>

<div id="listWrap">

<table>
<tr>
<td class="center"></td>
<td class="center"></td>
<td class="last center"></td>
</tr>

<?php	
	$sql = "SELECT name_first, name_last, attend, qty FROM rsvp ORDER BY name_first";
	$result = mysql_query($sql, $link);	
	
	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr><td>" . $row['name_first'] . " <span style='font-weight:100 !important;'>" . $row['name_last'] . "</span></td><td class='last center'>" . $row['attend'] . "</td>" . "</td><td class='last center'>" . $row['qty'] . "</td></tr>";
	}
?>
</table>
</div>



</body>
</html>