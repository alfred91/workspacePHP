<?php
    try {
        $dsn = "mysql:host=172.17.0.1:3306;dbname=new_schema";
        $dbh = new PDO($dsn, "root", "usuario");
    } catch (PDOException $e){
        echo $e->getMessage();
    }
  

    $stmt = $dbh->prepare("SELECT * FROM usuarios");
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $stmt->execute();

    while($row = $stmt->fetch()){

        echo "Id: ".$row['id']."<br>";
        echo "Nombre: ".$row['nombre']."<br>";
        echo "Email: ".$row['email']."<br>";
        echo "Contraseña: ".$row['password']."<br>";
    }
    ?>