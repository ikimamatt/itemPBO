<?php

    $host = 'localhost';
    $dbname = 'kas';
    $username = 'root';
    $password = '';
  
        try {
            $con = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi database gagal: " . $e->getMessage();
        }
  

?>
