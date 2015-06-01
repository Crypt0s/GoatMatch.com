<?php
//logged-on users don't need access to this
if ($_SESSION['auth'] == True){
    echo "Silly goat, you don't need to create a profile!  You're already logged on!";
    die();
// Create a new user
}elseif (isset($_POST['username'])){
    echo "hi";
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $about = $_POST['about'];
    $email = $_POST['email'];

    //SQL injection
    $q = mysql_query("select * from goats where user = '".$_POST["user"]."';");

    //account exists
    if (mysql_num_rows($q)>0){
        echo "This user account already exists.";
        die();
    }

    //OK, so the account must not exist, go ahead and create it, along with uploaded profile pic (if provided)
    if (!isset($_FILES["file"])){
        $picpath = "/var/www/html/uploads/default.jpg";
    }
    if ($_FILES["file"]["error"] > 0) {
        $picpath = "/var/www/html/uploads/default.jpg";
    } else {
        echo "Success";
        $_FILES["file"]["tmp_name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"/var/www/html/uploads/" . $_POST['username'] . $_FILES["file"]["name"]);
        $picpath = "/var/www/html/uploads/".$user.$_FILES["file"]["name"];
    }

    // id | username  | fname | lname | about | pass | email | pic
    $q = mysql_query("insert into goats values('','".$user."','".$fname."','".$lname."','".$about."','".$pass."','".$email."','".$picpath."');");
    if (!$q){
        echo mysql_error();
        echo "Error communicating with SQL db.";
    }else{
        echo "User Created!";
    }
    die();
}
//we didn't get a post var and we weren't logged in.  The user should be prompted to create their account
?>
<form method='POST' action="index.php?p=signup.php" enctype="multipart/form-data">
    <h1> Registration Page: </h1>
    Username: <input type="text" name="username"> <br/>
    Password: <input type="text" name="pass"> <br/>
    First Name: <input type="text" name="fname"> <br/>
    Last Name: <input type="text" name="lname"> <br/>
    About Me:  <textarea name="about" cols="25" rows="5"></textarea><br/>
    Email: <input type="text" name="email"> <br/>
    Profile Picture Upload: <input type="file" name="file" id="file"><br>
    <br/><br/><br/>
    <h3>OK!  I'm ready to meet other goats in my area today!<br/></h3>
    <center>
    <input type="submit" name="submit" value="Submit">
    </center>
</form>
