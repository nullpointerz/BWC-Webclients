<?php 
session_start();
if (isset($_SESSION["User"])) { 
    header("location: Index.php"); 
    exit();
}
?>
<?php 
 // checks if both fields are entered
 function Login()
{
 if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); 
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); 
    include "connect_to_mysql.php"; 
    $sql = mysql_query("SELECT id FROM bwc_users WHERE Username='$user' AND Password='$password' LIMIT 1"); 
  
    $existCount = mysql_num_rows($sql); 
    if ($existCount == 1) { 
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["User"] = $user;
		 $_SESSION["password"] = $password;
		 header("location: Index.php"); 
         exit();
    } else { 
	 echo "<script>alert('Incorrect Username And/Or Password');</script>";
	}
}
}
else
{
	echo"<script>alert('Wrong Captcha Code!');</script>";
}
}
if(isset($_POST['submit']))
{
   Login();
} 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Style/Style.css"
</head>
<body style="background-color: #000000";>
<div id="header">
<a href="Login.php"><img src="Style/Header3.jpg"/></a>
</div>
<div id="menu">

 </div>
 <div id="menu-fade-right"></div>
 <div id="menu-fade-left"></div>
<div id="mainbody"> 
    <div id="DefaultBody" style="overflow:auto;"> 
    <div id="login-text" align="center">
    <br /><br />
    <hr />
    <br /><br /><br /><br />
    <h1> Welcome To BWC - BigWillyCar </h1>
     <h2>Please log in to manage the website</h2>
      <form id="form1" name="form1" method="post" action="Login.php">
        Username:
       <input name="username" type="text" id="username" size="40" />
       <br /><br />
       Password:
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <img src="Captcha.php" />
       <input name="captcha" type="text" size="10">
       <br />
       <br />
       <input type="submit" name="submit" id="button" value="Log In" />
      </form>
      <br /><br /><br /><br />
      <hr />
</div>
    </div>
</div>
<div id="footer"> 
<div id="footer-text">
 Copyright &copy; 2000-2014 BigWillyCar Enterprises Ltd. All rights Reserved. 
 </div>
 </div>
</body>
</html>