<?php 

  // require_once '.\assets\php\biblioteca.php';

  include_once '.\assets\php\GoogleOAuth\get_user_information.php';
  
  session_start();  
  
  if (isset($_SESSION['access_token'])) {
    echo "<div class='row login_msg'>SESSION INICIADA</div>";
    // print_r(get_user_information($_SESSION['access_token']));
    $user_information = get_user_information($_SESSION['access_token']);
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="./assets/main.css">
  

</head>

<body class="col">

  <div class="row navegador_superior shadow">
    <div class="contenedor row centro_navegador">

      <div class="contenedor_izquierdo_nav row">

        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book"
          viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
        </svg>

        <label class="font_form_tittles" style="margin: 0px;">
          Biblioteca personal

        </label>

      </div>

      <svg id="open_login" class="clickeable" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle"
        viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
        <path fill-rule="evenodd"
          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
      </svg>

    </div>
  </div>

  <div class="contenido_pagina col contenedor">

    <div class="contenido_pagina_banner col shadow" style="background-image: url('./assets/images/banner.jpg');">


      <form class="buscador row shadow">
  
        <input>
  
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search"
          viewBox="0 0 16 16">
          <path
            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg>
      </form>
    </div>


    <div class="col contenedor_libros ">
      <div id="contenedor_libros" class="contenedor-horizontal-libros row">

        <div class="contenedor_libros_loader"> </div>
        
      </div>
    </div>

  </div>

  <div id="detalle_libro" class="close detalle_libro row">

    pronto regresamos

  </div>

  <div id="login" class="barra_formulario_login col close" >
    
    <div  class="login_opciones_close row">
      Cerrar
      <svg id="close_login" class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
      </svg>

    </div>
    
    <div class="login_contenedor_inferior col">
      <?php if (!isset($_SESSION['access_token'])): ?>
        <div class="col formulario_login_card"'>
      <?php else: ?>
        <div id="formulario_login_card" class="col formulario_login_card" style='display:none;'> 
      <?php endif; ?>
          <label class="font_tittles"> Login de usuarios</label>
          <form class="col formulario_login_main" method="post" action="./assets/php/login.php">
            
            <div class="col">
              <label class="font_form_tittles">Usuario:</label>
              <input type="text" name="usuario" style="height: 30px;">
            </div>
  
            <div class="col">
              <label class="font_form_tittles">Contrasena: </label>
              <input type="password" name="contrasena" style="height: 30px;">
            </div>
            
            <svg id="google_login" class='clickeable' xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
              <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
            </svg>
       
            <button id="btn_login_formulario" class="login_button">Iniciar Sesion</button>
      
          </form>
        </div>
    
      <?php if (isset($_SESSION['access_token'])): ?>
        
        <div class="login_image" style=" background-image: url('<?php echo $user_information['picture']; ?>'); "></div>
        <button id="logout" class='login_button login_button_logout clickeable' onclick="redirigir('http://localhost/PARCIALES/PARCIAL_4/assets/php/logout.php')"> CERRAR SESSION </button>
    
      <?php endif; ?>

    </div>

  </div>

  <script type="module" src="./assets/main.js"></script>

</body>

</html>