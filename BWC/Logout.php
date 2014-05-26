<?php
//author William Bergendahl
session_start();
unset($_SESSION['User']);		//empties the user session
session_destroy();			//Destroys all sessions
?>
<script language="javascript">
window.top.location='Login.php';		//Goes back to the login page
</script>
<?php
