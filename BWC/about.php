<?php
//session for checking that the user has logged in first, if not redirect the user to the login page.
session_start();
if (!isset($_SESSION["User"])) {
	header("location: Login.php");
	exit();
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Style/Style.css"
</head>
<body style="background-color: #000000";>
<?php include_once("Includes/Header.php"); ?>
<div id="mainbody"> 
   
     <div id="DefaultBody" style="overflow:auto;"> 
    <div id="login-text" align="center">
    <h1>BWC - (BigWillyCar) </h1>
    <hr />
    <p> What is BWC?
    <hr />
    <td> Unmatched in speed and functionality the BWC plows away all competitors in it's class! It's the one and only car featuring multiple controls. elegant design and utilizes the terrain to it's advantage. </td>
   
     
</div>
 </div>
</div>
<?php include_once("Includes/Footer.php");
 ?>

</body>
</html>