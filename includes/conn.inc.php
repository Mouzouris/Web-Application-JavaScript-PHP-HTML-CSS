<?php
$dsn = 'mysql:host=homepages.shu.ac.uk;dbname=b5026874_db1';
$user = 'b5026874';
$password = 'Mouzour1';
try { 
$pdo = new PDO($dsn, $user, $password); 
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$pdo ->exec("SET CHARACTER SET utf8");
}
catch (PDOException $e) { 
echo 'Connection failed again: ' . $e->getMessage();
}
?>