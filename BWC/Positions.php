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
			 $position = $row["Position"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["Date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="3" cellpadding="6">
        <tr>
          <td width="83%" valign="top"> <strong>Location:</strong> ' . $position . ' &nbsp;
          <strong>Added:</strong>  ' . $date_added . '
           <a href="PositionView.php?id=' . $id . '" style="float: right;">View Position</a></td> <br /> 
        </tr>
		<hr> </hr>
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
    <?php echo $dynamicList; // we print out every position ?>
    
     
</div>
    </div>
</div>
<?php include_once("Includes/Footer.php"); ?>

</body>
</html>