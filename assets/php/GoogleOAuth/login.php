<?php
    // Datos de la aplicación de Google
    include "../../../keys.php";

    $redirect_uri = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleOAuth/callback.php'; // Redirecciona a callback.php
    $scope = 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';

    // Construir la URL de autenticación
    $auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
        'client_id' => $client_id,
        'redirect_uri' => $redirect_uri,
        'response_type' => 'code',
        'scope' => $scope,
        'access_type' => 'offline'
    ]);

    // Redirigir al usuario a Google para autenticarse
    header('Location: ' . $auth_url);
    exit();
?>
