<?php
try {
    global $pdo;
    $pdo = new PDO("mysql:dbname=CRUD;host=localhost", "root", "");
} catch(PDOException $e) {
    echo 'Conexão falhou! Erro: '.$e->getMessage();
}
?>