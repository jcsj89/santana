<?php
try {
 $conn = new PDO('mysql:host=192.168.15.184:3306;dbname=santa355_site', 'jose', '0323');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2>Sucesso na conexao!</h2>";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>