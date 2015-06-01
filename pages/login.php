<?php

if (isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $q = mysql_query("select username from goats where username = '".$user."' and pass = '".$pass."';");
    if (mysql_num_rows($q)>0){
        $_SESSION['auth'] = 1;
        echo "Success";
    } else{
        echo "That username/password combo was baaaaaaaaaahhhhhhhhd.";
    }
}else{
    ?>
<form action="index.php?p=login.php" method="POST">
    Username: <input type="textbox" name="user" /><br/>
    Password: <input type="password" name="pass" /><br/>
    <input type="submit" Value="submit"/>
</form>
<a href="index.php?p=forgotpassword.php">Click Here to Reset Your Password</a>
<?php
}
?>
