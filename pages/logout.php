<?php 
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(),'',time()-42000,$params["path"],$params["domain"]);
session_destroy();

 ?>
You have been successfully Logged Out.
