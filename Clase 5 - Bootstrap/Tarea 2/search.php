<?php
$prompt = $_GET['prompt'];

$books = [
    'El señor de los anillos',
    'Harry Potter',
    'Cien años de soledad',
    'El principito',
];

$results = [];

foreach ($books as $book) {
    if (strpos(strtolower($book), strtolower($prompt)) !== false) {
        $results[] = $book;
    }
}

echo json_encode($results);
