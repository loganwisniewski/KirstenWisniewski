<?php

function makeRSVP($firstName, $lastName, $attend, $qty){
	require('db_conn.php');
	$sql    = 'INSERT INTO rsvp (name_first, name_last, attend, qty) VALUES("'. $firstName .'","'. $lastName .'","'. $attend .'","'. $qty .'");';
	$result = mysql_query($sql, $link);
	
	
	
	if (!$result) {
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}
}

function updateRSVP($firstName, $lastName, $attend, $qty){
	require('db_conn.php');
	$sql = sprintf("UPDATE rsvp SET attend='". $attend ."', qty='". $qty ."' WHERE name_first='%s' AND name_last='%s'",
    mysql_real_escape_string($firstName),
    mysql_real_escape_string($lastName));
	
	$result = mysql_query($sql, $link);
	
	
	
	if (!$result) {
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	
}

?>