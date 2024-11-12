import { toggle_element, redirigir } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";

const boton_formulario = document.getElementById('btn_login_formulario');
const contenedor_libro = document.getElementById('contenedor_libros');
const google_login = document.getElementById('google_login');

const close_login = document.getElementById('close_login');
const close_detalle = document.getElementById('close_detalle');

const open_login = document.getElementById('open_login');

const formulario_login_card = document.getElementById('formulario_login_card');
const login = document.getElementById('login');
const detalle_libro = document.getElementById('detalle_libro');

const GOOGLE_BOOK_URL = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleBooks/google_book.php';

//DEFECTOS DEL API DE GOOGLE BOOKS.
const cantidad_libros = 20;
const libro_buscado = "harry";
var libros_disponibles = await request(`${GOOGLE_BOOK_URL}?cantidad_libros=${cantidad_libros}&libro_buscado=${libro_buscado}`);


var arreglo_libros = libros_disponibles.items;


const libros = (imagen, titulo, id) => {
    return `
    <div id='book_${id}' class="libro_contenedor_general">
        
        <div class='libro' >   
            
            
            <div class='libro_caratula_inferior'> 
            
            </div>

            <div class="libro_paginas" >

            </div>

            <div class="libro_portada libro_imagen" onclick='toggle_detalle(1)' style="background-image: url('${imagen}');">

            </div>
          
            
        </div>

        <div class='libro_titulo'>
            ${titulo}
        </div>
       

    </div>
    
    `;
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





window.toggle_detalle = toggle_detalle;
window.arreglo_libros = arreglo_libros;

const prepara_contenido = () => {
    let HTML = "";
    let id = 0;

    arreglo_libros.forEach(element => {
        
        let imagen_libro = element.volumeInfo.imageLinks;
        let titulo = element.volumeInfo.title

        if(imagen_libro && titulo) {
            // console.log(imagen_libro.thumbnail);
            HTML += libros(imagen_libro.thumbnail, titulo, id);
        }

        id += 1;
            
    });

    return HTML;
}

setTimeout(() => {

    contenedor_libro.innerHTML = ""
    // console.log(arreglo_libros)
    // console.log(prepara_contenido())
    contenedor_libro.innerHTML = prepara_contenido();
    
}, 2000);





