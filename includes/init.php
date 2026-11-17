<?php

require __DIR__ . '/config.php';

// Function for safe html-code
function e(?string $text): string
{
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
}

//skapa databasinstans
$db = new Database();