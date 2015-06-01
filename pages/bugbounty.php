<?php

//Accepts a link to review for bug bounty

//A wild link appears!
if (isset($_POST['link'])){
    echo "An administrator is curently clicking on this link and reviewing it. Stay on this page for results...";
    //lol there's a bad thing here
    $result = shell_exec('firefox --display :0.0 -no-remote '. $_POST['link'] .'& sleep 10 && killall firefox;');
    echo $result;
}
?>

<form method="post" action="index.php?p=bugbounty.php">
    Link to the buggy page: <input type="textbox" name="link"/><br/>
    Description: <textarea cols="25" rows="5"></textarea><br/>
    Email: <input type="Textbox"/>
    Submit: <input type="Submit" />
</form>
