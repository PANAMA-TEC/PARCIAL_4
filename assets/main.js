const boton_formulario = document.getElementById('btn_login_formulario');
const contenedor_libro = document.getElementById('contenedor_libros');
const google_login = document.getElementById('google_login');

const close_login = document.getElementById('close_login');
const close_detalle = document.getElementById('close_detalle');

const open_login = document.getElementById('open_login');

const formulario_login_card = document.getElementById('formulario_login_card');
const login = document.getElementById('login');
const detalle_libro = document.getElementById('detalle_libro');

const cantidad_libros = 50;

const libros = () => {
    return `
        <div class='libro' >   
            
            <div class='libro_caratula_inferior'> 
            
            </div>

            <div class="libro_paginas" >

            </div>

            <div class="libro_portada libro_imagen" onclick='toggle_detalle(1)'>

            </div>

        </div>
    
    `;
} 

const validar_existencia_clase = (elemento, clase) => {
    return Array.from(elemento.classList).includes(clase);
}

const toggle_element = (toToggle) => {
    if (validar_existencia_clase(toToggle, "open")){
        toToggle.classList.add("close");
        toToggle.classList.remove('open');

    }else{
        
        toToggle.classList.add("open");
        toToggle.classList.remove('close');
    }
}

const toggle_login = () => {
    
    toggle_element(login);
}

const toggle_detalle = () => {  
    toggle_element(detalle_libro);
}


boton_formulario.addEventListener("click", (event) => {
    alert("presionado")
});

google_login.addEventListener("click", () => {
    redirigir('http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleOAuth/login.php');
})

close_login.addEventListener("click", ()=>{
    
   toggle_login();

})

close_detalle.addEventListener("click", ()=>{
    
    toggle_detalle();
 
 })

open_login.addEventListener("click", ()=>{
    
    toggle_login();

})




const redirigir = (mylink) => {
    // Redirigir a la página deseada
    window.location.href = mylink;
}

setTimeout( ()=>{
    contenedor_libro.innerHTML = "";

    for (let index = 0; index < cantidad_libros; index++) {
        contenedor_libro.innerHTML += libros()
        
    }

},3000)




