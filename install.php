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

//sample data
$examples = [
    ['Se norrsken i Tromsø', 'Åka till norra Norge under vintern och se norrskenet på riktigt.', 1],
    ['Vandra Kungsleden', 'Gå hela Kungsleden från Abisko till Hemavan med tält och ryggsäck.', 2],
    ['Resa till Japan', 'Besöka Tokyo och Kyoto under körsbärsblomningen.', 2],
    ['Springa ett maraton', 'Träna upp till 42 km och genomföra ett lopp.', 3],
    ['Skriva en bok', 'Skriva klart ett eget manus, oavsett om någon ger ut det.', 3],
];

//send sql-query to server
try {
    $db->run($sqlDrop);
    $db->run($sqlTable);
    echo 'Tabell skapad!';
} catch (PDOException $e) {
    echo 'Fel vid skapande av tabell: ' . e($e->getMessage());
}

//send sql query sample data
try {
    foreach ($examples as [$name, $description, $priority]) {
        $db->run(
            'INSERT INTO buckets (name, description, priority) VALUES (:name, :description, :priority)',
            ['name' => $name, 'description' => $description, 'priority' => $priority]
        );
        echo 'Exempeldata skapad!';
    }
} catch (PDOException $e) {
    echo 'Fel vid skapande av exempeldata: ' . e($e->getMessage());
}