<?php
    $users = [
        ['id' => 1, 'name' => 'Marco', 'surname' => 'Ferri', 'age' => 18],
        ['id' => 2, 'name' => 'Marco', 'surname' => 'Piteo', 'age' => 18],
        ['id' => 3, 'name' => 'Cristian', 'surname' => 'Pesola', 'age' => 18],
        ['id' => 4, 'name' => 'Damiano', 'surname' => 'Favale', 'age' => 18]
    ];

    http_response_code(200);
    header('Content-Type: application/json');

    echo json_encode([
        "status" => 200,
        "message" => "Success",
        "payload" => $users
    ]); 
    
    exit;
?>
