<?php
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
    <div id="sidebar"> 
    <div id="sb-text"> 
    <p><h3>Driving Instructions</h3></p>
    <p><li> Use WASD keys</li> </p>
    <p> W = Forward </p>
    <p> A = Turn Left</p>
    <p> S = Backward</p>
    <p> D = Turn Right </p>
    <hr> </hr>
    <p><h4><li>Extra Features </li></h4></p>
    <p> F = Turn Off lights</p>
    <p> G = Save GPS location</p>
    <p> H = Honk</p>
    <p> Enter = Shoot</p>
    <p> Space = Emergency Brake</p>
    </div>
    </div>
    <div id="mainpart" style="overflow:auto;"> 
    <div id="cam-stream">
   
   <img src="http://192.168.0.16:8080/?action=stream" alt="No Connection To The Pi Could be Established!" name="camimage" width="580" height="440" border="0" class="bild-border">
  <p id="status">Keyboard Command Status</p>
    </div>
         <div id="mp-text"> 
                
         </div>
        
    </div>
</div>

<?php include_once("Includes/Footer.php"); ?>
</body>
</html>
<script type="text/javascript">

var Message = "hello";
function WebSocketTest()
{
  if ("WebSocket" in window)
  {
	  console.log('Websocket Open Logged');
    
     // Let us open a web socket
     var ws = new WebSocket("ws://192.168.2.5:50007/");
     ws.onopen = function()
     {
		
        // Web Socket is connected, send data using send()
        ws.send(Message);
		console.log('Message Sent Logged: ' + Message); 
		 
     };
     ws.onmessage = function (evt) 
     { 
	 
        var received_msg = evt.data;
		console.log('Message Recieved Back Logged: ' + received_msg);
	 
     };
     ws.onclose = function()
     { 
        // websocket is closed.
        console.log('Closing socket Logged');
     };
	 ws.onerror = function(evt) 
	 {
		 console.log('Websocket Error' + evt.data);
	 }
  }
  else
  {
     // The browser doesn't support WebSocket
     alert("WebSocket NOT supported by your Browser, Switch Browser!");
  }
}

document.onkeydown = function(event) {	
	var Forward = 87;
	var Backward = 83;
	var Left = 65;
	var Right = 68;
	var Emergency_Stop = 32;
	
	var key_press = String.fromCharCode(event.keyCode);
	var key_code = event.keyCode;
	var status = document.getElementById('status');
	status.innerHTML = "DOWN Event Fired For : "+key_press;
	if (key_code == Forward && once == true) {
		
		status.innerHTML = "Moving Forward"
		Message = "forward";
		WebSocketTest();
		once = false;
	} else if (key_code == Backward && once == true) {
		status.innerHTML = "Moving Backward"
		Message = "back";
		WebSocketTest();
		once = false;
	}
	 else if (key_code == Left && once == true) {
		status.innerHTML = "Turning Left"
		Message = "left";
		WebSocketTest();
		once = false;
	}
	else if (key_code == Right && once == true) {
		status.innerHTML = "Turning Right"
		Message = "right";
		WebSocketTest();
		once = false;
	}
	else if (key_code == Emergency_Stop && once == true) {
		status.innerHTML = "Emergency Brake"
		Message = "break";
		WebSocketTest();
		once = false;
	}
	
}
var once = true;
document.onkeyup = function(event){
    var key_press = String.fromCharCode(event.keyCode);
	var status = document.getElementById('status');
	status.innerHTML = key_press +" is not a control button";
	if(event.keyCode == 87 && once == false) {
        status.innerHTML = "Stopping forward";
		Message = "stop";
		once = true;
		
    } else if (event.keyCode == 83 && once == false) {
		status.innerHTML = "Stopping Backward";
		Message = "stop";
		once = true;
		
	} else if (event.keyCode == 65 && once == false) {
		status.innerHTML = "Stopping Left!";
		Message = "stop";
		once = true;
		
	} else if (event.keyCode == 68 && once == false) {
		status.innerHTML = "Stopping Right!";
		Message = "stop";
		once = true;
		
	}
	else if (event.keyCode == 32 && once == false) {
		status.innerHTML = "Emergency Brake stopped";
		Message = "stop";
		once = true;
		
	}	
}
</script>