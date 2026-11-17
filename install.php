<?php
include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

if($db->connect_error) {
    die("Conntection failed: " . $db->conntect_error);
}

//create db table
$sql = "
DROP TABLE IF EXISTS buckets;
CREATE TABLE buckets(
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    description VARCHAR (150) NOT NULL,
    priority INT NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);";

//send sql-query to server
if($db->multi_query($sql)) {
    echo "Skapad tabell OK!";
} else {
    echo "Fel vid skapande av tabell";
}