<?php
    try {
        $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
        $dbh = new PDO($dsn, "root", "usuario");
    } catch (PDOException $e){
        echo $e->getMessage();
    }

$consulta=$dbh->prepare("UPDATE usuarios SET email=?,password=? WHERE id=? ");

$consulta->bindValue(1,"luisita@gmail.com");
$consulta->bindValue(2,"Luisa");
$consulta->bindValue(3,2);

$consulta->execute();

echo"Insertado";
?>