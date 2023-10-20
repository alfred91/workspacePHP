<?php
    try {
        $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
        $dbh = new PDO($dsn, "root", "usuario");
    } catch (PDOException $e){
        echo $e->getMessage();
    }

$consulta=$dbh->prepare("INSERT INTO usuarios (nombre,email,password)VALUES(?,?,?)");

$consulta->bindValue(1,"Luisa");
$consulta->bindValue(2,"luisa@gmail.com");
$consulta->bindValue(3,"12345678");

$consulta->execute();

echo"Insertado";
?>