<?php 
session_start();
if (!isset($_SESSION["User"])) {
	header("location: Login.php");
	exit();
}
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    include "connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the position 
	// details, if no then exit this script and give message why
	$sql = mysql_query("SELECT * FROM bwc_positions WHERE ID='$id' LIMIT 1");
	$productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){ 
			 $position = $row["Position"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["Date_added"]));
         }
		 
	} else {
		echo "The position does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
mysql_close();
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="Style/Style.css"
<title><?php echo $position; ?></title>

</head>
<body style="background-color: #000000";>
<?php include_once("Includes/Header.php"); ?>
<div id="mainbody"> 
   
     <div id="DefaultBody" style="overflow:auto;"> 
    <div id="login-text" align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="81%" align="left" valign="top">
      <p><?php echo "<strong>ID number:</strong> ".$id.""; ?><br />
       
         <p><?php echo "<strong>Added:</strong> ".$date_added; ?><br />
         <br />
        <?php echo "<strong>Position:</strong> ".$position; ?> 
        <hr />
</p>
<img src="http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:green%7Clabel:G%7C40.711614,-74.012318&sensor=false" alt="Google Map Interface!" height="350" width="750" style=" alignment-baseline:middle"" />
</p>

<div id="map_canvas" style="height:350px; width:750px;"> 

</div>
</td>
</tr>
</table>
</div>
</div>
</div>
<?php include_once("Includes/Footer.php"); ?>

</body>
</html>