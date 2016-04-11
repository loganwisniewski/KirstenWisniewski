<?php

function checkRSVP($firstName, $lastName){
	require('db_conn.php');
	$sql = sprintf("SELECT COUNT(*) FROM rsvp WHERE name_first='%s' AND name_last='%s'",
    mysql_real_escape_string($firstName),
    mysql_real_escape_string($lastName));
	
	$result = mysql_query($sql, $link) or die(mysql_error());;
	
	if (mysql_result($result, 0) == 0) {
		return false;
	} 
	
	return true;
}

?>