<?php
$filename = "/etc/passwd\0" . ".someextension";
if (file_exists($filename)){
    echo "The file " . $filename . "Exists";
} else {
    echo "The file " .$filename . "Doesn't exist";
}
?>
