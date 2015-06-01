<?php
session_start();
include('mysql.php');
include('header.php');

// can't have it this easy
if (!isset($_GET['p']) || strpos($_GET["p"],'..') || !file_exists('pages/'.$_GET["p"])){
    include('pages/index.php');
}else{
    include('pages/'.$_GET["p"]);
}

include('footer.php');
?>
