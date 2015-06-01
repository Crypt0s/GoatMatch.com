<?php
//if there's no file, just go
if (!$_FILES["file"]){
?>
<form action="index.php?p=upload.php" method="POST" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
<?php
exit(0);
}

// there's a file, ok
if ($_FILES["file"]["error"] > 0) {
  echo "Error";
} else {
  echo "Success";
  $_FILES["file"]["tmp_name"];
  move_uploaded_file($_FILES["file"]["tmp_name"],"/var/../var/www/html/uploads/" . $_SESSION['username'] . $_FILES["file"]["name"]);
}

?>
