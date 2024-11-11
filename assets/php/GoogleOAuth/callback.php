<?php
    session_start();
    include "../../../keys.php";

    if (isset($_GET['code'])) {
        // Datos de la aplicación de Google
        $redirect_uri = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleOAuth/callback.php';

        // Código de autorización recibido en el parámetro 'code'
        $code = $_GET['code'];

        // Configuración de la solicitud de token de acceso
        $token_url = 'https://oauth2.googleapis.com/token';
        $token_data = [
            'code' => $code,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'grant_type' => 'authorization_code'
        ];

        // Enviar la solicitud de token de acceso con cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $token_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $token = json_decode($response, true);
        

        // Almacenar el token de acceso en la sesión
        if (isset($token['access_token'])) {
            $_SESSION['access_token'] = $token['access_token'];
        }

        // Redirigir a welcome.php para obtener y mostrar la información del usuario
        header("Location: http://localhost/PARCIALES/PARCIAL_4");
        exit();
    }
?>
