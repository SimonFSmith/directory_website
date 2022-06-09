<?php
    $servername = "localhost";
    $dbname = "bottin";
    $charset = "utf8";
    $username = "root";
    $password = "Automne,2021";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
      die("Connection failed: ".$e->getMessage());
    }
?>