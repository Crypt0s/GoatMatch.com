<?php

try {
    $pdo_connection = new PDO("mysql:host=localhost;dbname=goatlove", "root", "");
    //$name="Lisa";
    //$q = $connection->prepare("SELECT fname, lname from goats WHERE fname = :name");
    //$q->bindParam(":name", $name);
    //$q->execute();
    //$rows = $q->fetchAll();

    //foreach($rows as $row){
    //     echo "First name: " . $row[0] . "<br>Last name: " . $row[1];
    //}

} catch(PDOException $e){
    die("Unable to connect to db.");
}
?>
