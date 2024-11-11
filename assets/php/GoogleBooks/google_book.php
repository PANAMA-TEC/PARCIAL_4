<?php
    
    // URL de la API
    $url = "https://www.googleapis.com/books/v1/volumes?q=panama&maxResults=20";

    // Configuración del contexto
    $options = [
        'http' => [
            'header'  => "Content-type: application/json",
            'method'  => 'GET'  
        ]
    ];

    // Crear un contexto con las opciones
    $context = stream_context_create($options);

    // Realizar la petición
    $response = file_get_contents($url, false, $context);

    // Verificar si hubo un error en la respuesta
    if ($response === FALSE) {
        die('Error en la petición');
    }

    // Decodificar la respuesta JSON
    $data = json_decode($response, true);

    // Mostrar los datos obtenidos
    print_r(json_encode($data));

?>