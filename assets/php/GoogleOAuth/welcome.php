<?php
    session_start();

    // Verifica si el usuario tiene un token de acceso
    if (!isset($_SESSION['access_token'])) {
        header('Location: login.php');
        exit();
    }

    // Token de acceso
    $access_token = $_SESSION['access_token'];

    // URL de la API para obtener la información del usuario
    $userinfo_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token;

    // Solicitud a la API de información de usuario
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $userinfo_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificar la respuesta JSON
    $user_info = json_decode($response, true);

    print_r($user_info);

    // Mostrar la información del usuario
    if (isset($user_info['name'])) {
        echo "<h1>Bienvenido, " . htmlspecialchars($user_info['name']) . "</h1>";
        echo "<p>Email: " . htmlspecialchars($user_info['email']) . "</p>";
        echo "<img src='" . htmlspecialchars($user_info['picture']) . "' alt='Foto de perfil'>";
        echo "<p><a href='logout.php'>Cerrar sesión</a></p>";
    } else {
        echo "No se pudo obtener la información del usuario.";
    }
?>
