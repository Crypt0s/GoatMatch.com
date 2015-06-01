Users in your area now:<BR/>

<?php
$q = mysql_query("select username from goats;");
while ($res = mysql_fetch_object($q)){
    $username = $res->username;
    echo $username . "<br/><a href='index.php?p=profile.php&user=".$username."'><img src='uploads/".$username."/profile.jpg' /></a><br/><br/>";
}
?>
