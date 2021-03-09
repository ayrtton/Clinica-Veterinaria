<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinicaveterinaria";

    try {
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
?>