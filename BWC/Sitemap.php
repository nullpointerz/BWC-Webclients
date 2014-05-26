<?php
session_start();
if (!isset($_SESSION["User"])) {
	header("location: Login.php");
	exit();
}
include "connect_to_mysql.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM bwc_positions ORDER BY date_added DESC");
$positionCount = mysql_num_rows($sql); // count the output amount
if ($positionCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["ID"];
			 $dynamicList .= '<table width="100%" border="0" cellspacing="3" cellpadding="6">
        <tr>
          <li> <a href="PositionView.php?id=' . $id . '" style="float: center;">PositionView.php?id' . $id . '</a> </li></td> <br /> 
        </tr>
      </table>';
    }
} else {
	$dynamicList = "<br /><br />We currently have no positions listed at the moment.";
}
mysql_close();
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
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="81%" align="left" valign="top">
      <p><strong>Standard Links</strong></p>
      
     <li> <a href="Index.php"> Home </a></li> <br /> 
     <li><a href="Positions.php"> Positions </a></li> <br />
      <li><a href="About.php"> About BWC </a> </li> <br /> 
      <li><a href="Login.php"> Login (Requires you to have logged out to access this page) </a> </li>
        <hr />
<p><strong>Dynamically Generated Position Links</strong></p>
 <p style="font-size:12px"><?php echo $dynamicList ?></p>
</p>
</td>
</tr>
</table>
</div>
</div>
</div>
<?php include_once("Includes/Footer.php"); ?>
</body>
</html>