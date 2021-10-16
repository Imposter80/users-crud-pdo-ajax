<?php

$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "test_encomage_db";

//-------------- create a database --------------
try {
     $conn = new PDO("mysql:host=$serverName", $userName, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create DB
     $sql = "CREATE DATABASE $dbName CHARACTER SET utf8 COLLATE utf8_general_ci";

     $conn->exec($sql);
     echo "Database created successfully <br>";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
}
$conn = null;



//-------------- create table --------------
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
  update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
  )";

    $conn->exec($sql);
    echo "User table created successfully <br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}



//-------------- filling the database --------------
try {
    // sql to insert table
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES                                                            
    ('Darth', 'Vader', 'Vader@mail.com'),
    ('Mace', 'Windu', 'Windu@mail.com'),
    ('Qui-Gon', 'Jinn', 'Jinn@mail.com'),
    ('Padme', 'Amidala', 'Amidala@mail.com'),
    ('Anakin', 'Skywalker', 'AnSkywalker@mail.com'),
    ('Lando', 'Calrissian', 'Calrissian@mail.com'),
    ('Darth', 'Maul', 'Maul@mail.com'),
    ('Emperor', 'Palpatine', 'Palpatine@mail.com'),
    ('Obi-Wan', 'Kenobi', 'Kenobi@mail.com'),
    ('Kylo', 'Ren', 'Ren@mail.com'),
    ('Boba', 'Fett', 'Fett@mail.com'),
    ('Luke', 'Skywalker', 'LukeSkywalker@mail.com'),
    ('Han', 'Solo', 'Solo@mail.com'),
    ('Princess', 'Leia', 'Leia@mail.com'),
    ('Wookie', 'Chewbacca', 'Chewbacca@mail.com')";

    $conn->exec($sql);
    echo "All records created successfully <br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>