<?php
       
    if (isset($_GET['libro_buscado']) && isset($_GET['cantidad_libros'])){
        
        
        $termino_busqueda = htmlspecialchars($_GET['libro_buscado'], ENT_QUOTES, 'UTF-8');
        $cantidad_libros = htmlspecialchars($_GET['cantidad_libros'], ENT_QUOTES, 'UTF-8');
        
        $termino_busqueda = str_replace(" ","+", $termino_busqueda);
        
        $url = "https://www.googleapis.com/books/v1/volumes?q=$termino_busqueda&maxResults=$cantidad_libros";
    }else if (isset($_GET['cantidad_libros'])) {
        
        $cantidad_libros = htmlspecialchars($_GET['cantidad_libros'], ENT_QUOTES, 'UTF-8');
        $url = "https://www.googleapis.com/books/v1/volumes?q=panama&maxResults=$cantidad_libros";
    } else if (isset($_GET['libro_buscado'])) {
        $termino_busqueda = htmlspecialchars($_GET['libro_buscado'], ENT_QUOTES, 'UTF-8');
        $termino_busqueda = str_replace(" ","+", $termino_busqueda);
        $url = "https://www.googleapis.com/books/v1/volumes?q=$termino_busqueda";
    }

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