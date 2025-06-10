<?php
    include('config_pdo_def.php');

    try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
		echo "Falha na conexão com banco de dados: " . $e->getMessage();
    }
?> 