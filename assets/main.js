const boton_formulario = document.getElementById('btn_login_formulario');
const contenedor_libro = document.getElementById('contenedor_libros');
const google_login = document.getElementById('google_login');
const close_login = document.getElementById('close_login');
const formulario_login_card = document.getElementById('formulario_login_card');
const login = document.getElementById('login')

const cantidad_libros = 50;

const libros = () => {
    return `
        <div class='libro'>   
            
            <div class='libro_caratula_inferior'> 
            
            </div>

            <div class="libro_paginas" >

            </div>

            <div class="libro_portada libro_imagen" >

            </div>

        </div>
    
    `;
} 

const validar_existencia_clase = (elemento, clase) => {
    return Array.from(elemento.classList).includes(clase)
}

boton_formulario.addEventListener("click", (event) => {
    alert("presionado")
});

google_login.addEventListener("click", () => {
    redirigir('http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleOAuth/login.php');
})

close_login.addEventListener("click", ()=>{
    login.classList.add("open");
})

console.log((Array.from(formulario_login_card.classList).includes('close')))


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




