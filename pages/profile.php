<?php
//include("../mysql.php");

$name = $_GET['user'];

$name = mysql_real_escape_string($name);
$myq = mysql_query("select * from goats where username = '".$name."';");

echo "<img src='uploads/".$name."/profile.jpg' /><br/>";
while ($res = mysql_fetch_object($myq)){
    $about = $res->about;
    $fname = $res->fname;
    $email = $res->email;
    echo $fname . "<br/>";
    echo "About me: " . $about . "<br/>";
    echo "Contact me: " . $email . "<br/>";
}

?>
<!-- if then null poison bug still existed, this would lead to arb. file reads, but this is 2014, so it doesn't. -->
