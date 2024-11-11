<?php
    
    function get_user_information ($access_token) {

        $userinfo_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token;

        // Solicitud a la API de información de usuario
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userinfo_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $user_info = json_decode($response, true);

        return $user_info;
    }


?>