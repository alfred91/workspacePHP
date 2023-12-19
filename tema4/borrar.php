<?php
    try {
        $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
        $dbh = new PDO($dsn, "root", "usuario");
    } catch (PDOException $e){
        echo $e->getMessage();
    }

$consulta=$dbh->prepare("DELETE FROM usuarios WHERE id=?");

$consulta->bindValue(1,2);

$consulta->execute();

echo"Borrado";
?>