<?php
include("/var/www/goats/pdo.php");
if (isset($_GET['email'])){
	echo "A password Reset link has been emailed to your account";
	//mail( $to, $subject, $message [additionalheaders [additional params]]
        $resetlink = "http://" . $_SERVER["SERVER_ADDR"]  . "/index.php?p=forgotpassword.php&reset=" . base64_encode(time());

        // add the reset link to the list of active reset links
        $RESETLIST[$resetlink] = $_GET['email'];

	mail($_GET['email'], "Password Reset", "Here is your password reset email - " . $resetlink);
}elseif (isset($_GET['reset']) && !isset($_POST['password'])){
?>
<form action="index.php?p=forgotpassword.php" method="POST">
	New Password: <input type="textbox" name="password" />
	<input type="submit" value="Send">
</form>
<?php
}elseif (isset($_GET['reset']) && isset($_POST['password'])){
	if (in_array($_GET['reset'],array_keys($RESETLIST))){
		//reset the users password!
		
		$q = $pdo_connection->prepare("UPDATE goats SET password =? where email=?");
		$q->execute([$_POST['password'],$RESETLIST[$_GET['reset']]]);
		//remove the reset link
		unset($RESETLIST[$_GET['reset']]);
	}
	else{
		echo "That password reset link is invalid.";
	}
}else{
?>
<form action="index.php?p=forgotpassword.php" method="GET">
	Email Address: <input type='textbox' value='' name="email">
	<input type="hidden" value="forgotpassword.php" name="p">
	<input type="submit" value="Send Reset Link">

</form>

<?php
};
?>
