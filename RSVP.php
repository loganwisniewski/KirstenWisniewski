<?php 

require_once('bin/checkRSVP.php');
require_once('bin/insert.php');

if(checkRSVP($_POST['firstName'], $_POST['lastName']) == false){
	makeRSVP($_POST['firstName'], $_POST['lastName'], $_POST['attend'], $_POST['qty']);
} else {
	updateRSVP($_POST['firstName'], $_POST['lastName'], $_POST['attend'], $_POST['qty']);
}

?>