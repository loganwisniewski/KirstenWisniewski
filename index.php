

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Kirsten Wisniewski</title>
<link rel="stylesheet" type="text/css" href="/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script type="text/javascript">
var successText = 0;

function onLoad(){
	
	<?php 
	
	require_once('bin/checkRSVP.php');
	require_once('bin/insert.php');
	
	if($_POST['firstName'] != null){
		if(checkRSVP($_POST['firstName'], $_POST['lastName']) == false){
			makeRSVP($_POST['firstName'], $_POST['lastName'], $_POST['attending'], $_POST['qty']);
			
			echo('successText = 1;');
			
		} else {
			updateRSVP($_POST['firstName'], $_POST['lastName'], $_POST['attending'], $_POST['qty']);
			
			echo('successText = 2;');
			
		}
	}
	?>
	if(successText == 1){
	
		document.getElementById('rsvpC').hidden = false;
		document.getElementById('RSVP').hidden = true;
		document.getElementById('info').hidden = true;
		document.getElementById('pics').hidden = true;
	
	} else if(successText == 2){
	
		document.getElementById('rsvpU').hidden = false;
		document.getElementById('RSVP').hidden = true;
		document.getElementById('info').hidden = true;
		document.getElementById('pics').hidden = true;
	
	} else {
		document.getElementById('info').hidden = false;
	}
	
}

var tempFam = false;
var tempQty = 1;

function toggleQty(){
	if(document.getElementById('qtyWrap').hidden == false){
		tempQty = document.getElementById('qty').value;
		document.getElementById('qty').value = 1;
		document.getElementById('qtyWrap').hidden = true;
		tempFam = false;
	} else {
		document.getElementById('qty').value = tempQty;
		document.getElementById('qtyWrap').hidden = false;
		tempFam = true;
	}
}

function toggleFam(){
	
	var e = document.getElementById('attending');
	
	if(e.options[e.selectedIndex].value == "No"){					 /** Hide Fam & QTY **/
		document.getElementById('famWrap').hidden = true;
		document.getElementById('qtyWrap').hidden = true;
		tempQty = document.getElementById('qty').value;
		document.getElementById('qty').value = 0;
	} else {													 /** Show Fam & QTY **/
		if(document.getElementById('qty').value != 0){
			tempQty = document.getElementById('qty').value;}
		document.getElementById('famWrap').hidden = false;
		if(tempFam == true){
			document.getElementById('qtyWrap').hidden = false;
			document.getElementById('qty').value = tempQty;
		}
	}	
}

function verify() {
 if(document.getElementById("firstName").value=="" || document.getElementById("lastName").value=="") {
    alert("Please enter a first and last name");
 } else if(document.getElementById("firstName").value==""){
	alert("Please enter a first name");
 } else if(document.getElementById("lastName").value==""){
	alert("Please enter a last name");
 } else if(document.getElementById("qty").value == "" && document.getElementById("family").value == true){
	alert("Please enter a last name");
 } else {
    document.getElementById('RSVP').submit();
  }
}

function show(tab){
	if(tab == 1){
		document.getElementById('RSVP').hidden = true;
		document.getElementById('info').hidden = false;
		document.getElementById('pics').hidden = true;
		document.getElementById('rsvpC').hidden = true;
		document.getElementById('rsvpU').hidden = true;
	}
	
	if(tab == 2){
		document.getElementById('RSVP').hidden = false;
		document.getElementById('info').hidden = true;
		document.getElementById('pics').hidden = true;
		document.getElementById('rsvpC').hidden = true;
		document.getElementById('rsvpU').hidden = true;
	}
	
	if(tab == 3){
		document.getElementById('RSVP').hidden = true;
		document.getElementById('info').hidden = true;
		document.getElementById('pics').hidden = false;
		document.getElementById('rsvpC').hidden = true;
		document.getElementById('rsvpU').hidden = true;
	}
}
</script>
</head>

<body onload="onLoad()">
<div id="mobile"><img width="50%" src="images/rotate.png" id="mobileOnly" /></div>
<div id="headText">Kirsten Wisniewski</div>
<div id="rsvpForm">

<!-- 

			RSVP

 -->
<form id="RSVP" action="index.php" method="post" hidden> 
<div class="clearfix" id="fnWrap"><t>First Name</t><input type="text" name="firstName" id="firstName"/></div>
<div class="clearfix" id="lnWrap"><t>Last Name</t><input type="text" name="lastName" id="lastName"/></div>
<div id="famWrap"><t>As A Family?</t><br />
<input type="checkbox" value="yes" name="family" onclick="toggleQty()" id="family" class="css-checkbox"/><label for="family" class="css-label"></label></div>

<br /><br />

<div class="clearfix" id="attendWrap">
    <t>Attending?</t><br />
<select name="attending" id="attending" onchange="toggleFam()">
  <option value="Yes" name="attend" id="attend">Yes</option>
  <option value="Maybe" name="attend" id="attend">Maybe</option>
  <option value="No" name="attend" id="attend">No</option>
</select> 
</div>
<div class="clearfix" id="qtyWrap" hidden><t>Family Count</t><br /><input type="text" name="qty" id="qty" value="1"/></div>
<div class="clearfix" id="buttonWrap"><input type="button" id="rsvpButton" class="btn" value="RSVP" onclick="verify()"/></div>
</form>


<!-- 

			Info

 -->

<div id="homePage">
<img src="images/info.png" id="info"/>
</div>


<!-- 

			Pics

 -->
 <div id="pics" hidden>
<iframe width="560" height="315" src="https://www.youtube.com/embed/bTqTKkU-ntg?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>

<!-- 

			RSVP Created

 -->
<div id="rsvpC" hidden>
	Your RSVP has been received!
</div>


<!-- 

			RSVP Updated

 -->
<div id="rsvpU" hidden>
	Your RSVP has been updated!
</div>



<div class="clearfix" id="temp"></div>
</div>
<div id="footer">Designed by <a href="http://interlyncdesigns.com">Logan Wisniewski | Interlync Designs</a></div>
<div id="menuWrap"><div id="homeBtn" onclick="show(1)">Home</div><div id="rsvpBtn" onclick="show(2)">RSVP</div><div id="picsBtn" onclick="show(3)">Senior Pics</div></div>
</body>
</html>