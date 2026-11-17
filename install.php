<?php
require __DIR__ . '/includes/init.php';

//drop if exists
$sqlDrop = "
DROP TABLE IF EXISTS buckets;
);";
//create db table
$sqlTable = "
CREATE TABLE buckets(
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    description VARCHAR (150) NOT NULL,
    priority INT NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);";

//send sql-query to server
try {
    $db->run($sqlDrop);
    $db->run($sqlTable);
    echo 'Tabell skapad!';
} catch (PDOException $e) {
    echo 'Fel vid skapande av tabell: ' . e($e->getMessage());
}