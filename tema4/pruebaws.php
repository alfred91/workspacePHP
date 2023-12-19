
<?php
    try {
        $dsn = "mysql:host=bd-php.ce11h3vdzbob.us-east-1.rds.amazonaws.com:3306;dbname=php";
        $dbh = new PDO($dsn, "admin", "servidor2024");
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
 
