<?php
$con=mysql_connect("192.168.1.81", "root", "admin" ); //sets host, username and password
if (!$con) { die('could not connect: ' .mysql_error()); }
mysql_select_db("BWC", $con);  //selects database
 
$sql = mysql_query("SELECT * FROM users ");
$Count = mysql_num_rows($sql); // count the output amount
if ($Count > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $output[] = $row;
			echo json_encode($output);
    }
} else {
	echo "No users found!";
}
mysql_close();
?>