<?php

if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    echo "This page is only accessible via the local host by administrator.";
}else{
    if (!isset($_GET['gettheflag1234'])){
    ?>
    Admin Settings Panel:
    <form action="admin.php" method="get">
        <input type="hidden" name="gettheflag1234" value="True"/>
        <input type="submit" value="Get Flag"/>
    </form>
    <?php
    }elseif ($_GET['gettheflag1234'] == True){
        echo "The flag is: Who wouldn't love goats?";
    }
}
?>
