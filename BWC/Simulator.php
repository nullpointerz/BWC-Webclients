<?php
session_start();
if (!isset($_SESSION["User"])) {
	header("location: Login.php");
	exit();
}
?>
<html>
<head>
<script type="text/javascript">
<!--
var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
if (document.location.protocol == 'https:')
    unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
document.write('<script type="text/javascript" src="' + unityObjectUrl + '"></script>');
-->
</script>
<link rel="stylesheet" type="text/css" href="Style/Style.css"
</head>
<body style="background-color: #000000";>
<?php include_once("Includes/Header.php"); ?>
<div id="mainbody"> 
   
     <div id="DefaultBody" style="overflow:auto;"> 
    <div id="login-text" align="center">
    
    <embed src="unitywebplayer.unity3d" type="application/vnd.unity" width="580" height="440" firstframecallback="UnityObject2.instances[0].firstFrameCallback();" enabledebugging="0" style="display: block; width: 800px; height: 500px;">
     
</div>
 </div>
</div>
<?php include_once("Includes/Footer.php"); ?>

</body>
</html>