import { toggle_element, redirigir } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";
import { mostrar_detalles_libros } from "./modules/detallesGenerales/index.js";

const boton_formulario = document.getElementById('btn_login_formulario');
const contenedor_libro = document.getElementById('contenedor_libros');
const google_login = document.getElementById('google_login');

const close_login = document.getElementById('close_login');
const open_login = document.getElementById('open_login');

const formulario_login_card = document.getElementById('formulario_login_card');
const login = document.getElementById('login');
const detalle_libro = document.getElementById('detalle_libro');
const boton_buscador = document.getElementById('boton_buscador');
const texto_buscado = document.getElementById('libro_buscado');


const GOOGLE_BOOK_URL = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleBooks/google_book.php';

//DEFECTOS DEL API DE GOOGLE BOOKS.
const cantidad_libros = 20;
const libro_buscado = "harry";

const urlParams = new URLSearchParams(window.location.search);
var libros_disponibles = await request(`${GOOGLE_BOOK_URL}?cantidad_libros=${cantidad_libros}&libro_buscado=${libro_buscado}`);
var arreglo_libros = libros_disponibles.items;
var arreglo_libros_detalle = arreglo_libros;


const libros = (imagen, titulo_libro, descripcion, autor, ano_publicacion, my_book_id) => {
    
    return `
        <div  class="libro_contenedor_general">
            
            <div class='libro' >   
                
                
                <div class='libro_caratula_inferior'> 
                
                </div>

                <div class="libro_paginas" >

                </div>

                <div id='book_${my_book_id}' class="libro_portada libro_imagen" 
                    onclick="toggle_detalle('${titulo_libro}', '${descripcion}','${imagen}', '${autor}', '${ano_publicacion}', '${my_book_id}')" 
                    style="background-image: url('${imagen}');">
                </div>
            
            </div>

            <div class='libro_titulo'>
                ${titulo_libro}
            </div>
        

        </div>
    
    `;
} 

const toggle_login = () => {
    toggle_element(login);
}

const toggle_detalle = (titulo_libro, descripcion, imagen, autor, ano_publicacion, my_book_id) => {  

    // let my_book_id = id.replace("book_", "");
    // let book_details = arreglo_libros_detalle[my_book_id];
    
    // let titulo_libro = book_details.volumeInfo.title;
    // let descripcion = book_details.volumeInfo.description;
    // let imagen = book_details.volumeInfo.imageLinks.thumbnail;
    // let autor = book_details.volumeInfo.authors[0];
    // let ano_publicacion = book_details.volumeInfo.publishedDate;
    

    detalle_libro.innerHTML = "";
    detalle_libro.innerHTML = mostrar_detalles_libros(titulo_libro, descripcion,imagen, autor, ano_publicacion, my_book_id);

    toggle_element(detalle_libro);
}

const listar_libros = (array) => {

    let HTML = "";
    let id = 0;

    array.forEach(element => {
        
        let imagen_libro = element.volumeInfo.imageLinks.thumbnail;
        let titulo_libro = element.volumeInfo.title
        let descripcion = element.volumeInfo.description;
        let autor = element.volumeInfo.authors[0];
        let ano_publicacion = element.volumeInfo.publishedDate;
        let my_book_id = element.volumeInfo.publishedDate;
        
        if(imagen_libro && titulo_libro) {
            // console.log(imagen_libro.thumbnail);
            HTML += libros(imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id);
        }

        id += 1;
            
    });

    return HTML;
}

const obtener_libro = (imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id) => {

    if(imagen_libro && titulo_libro) {
        // console.log(imagen_libro.thumbnail);
       return libros(imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id);
    }

}

const agregar_favorito = (titulo_libro, descripcion,imagen, autor, ano_publicacion, my_book_id) => {
    
    let api = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/guardar_favoritos.php';

    if (my_book_id && titulo_libro && descripcion && imagen && autor){

        detalle_libro.innerHTML = "";
    
        // const my_book_id = id.replace("agregar_favorito_", "");
        // const book_details = arreglo_libros[my_book_id];

        // const user_id = '1'; 
        // const google_books_id = book_details.id;
        // const titulo = book_details.volumeInfo.title;
        // const autor = book_details.volumeInfo.authors[0];
        // const imagen_portada = book_details.volumeInfo.imageLinks.thumbnail;
        const resena_personal = "sin resena personal";
        // const descripcion_libro = !book_details.volumeInfo.description ? `
        //     Este libro, aunque aún no tiene una descripción detallada, guarda en sus páginas una historia única esperando ser descubierta. A veces, las mejores aventuras son aquellas que no se pueden resumir en unas pocas palabras. Te invitamos a abrir sus páginas y sumergirte en una narrativa que solo tú podrás experimentar. ¿Qué secretos esconde? Solo al leerlo podrás saberlo.    
        // `: book_details.volumeInfo.description ;

        
        const URL = `${api}?user_id=${encodeURIComponent('0')}&google_books_id=${encodeURIComponent(my_book_id)}&titulo=${encodeURIComponent(titulo_libro)}&autor=${encodeURIComponent(autor)}&imagen_portada=${encodeURIComponent(imagen)}&resena_personal=${encodeURIComponent(resena_personal)}&descripcion_libro=${encodeURIComponent(descripcion)}`;
        request(URL);
        toggle_detalle();
        
    }else {
        alert('error_detectado');
    }
    
}

const eliminar_favoritos = (book_id) => {
    alert(book_id)
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

open_login.addEventListener("click", ()=>{
    
    toggle_login();

})

boton_buscador.addEventListener('click', async () => {
    
    if (texto_buscado.value){
        
        let termino_busqueda = texto_buscado.value; 
        libros_disponibles = await request(`${GOOGLE_BOOK_URL}?cantidad_libros=${cantidad_libros}&libro_buscado=${termino_busqueda}`);
        arreglo_libros = libros_disponibles.items;

        contenedor_libro.innerHTML = "";
        contenedor_libro.innerHTML = listar_libros(arreglo_libros);
        
    }else{
        alert('not posible');
    }
    
})

setTimeout(async () => {
    if (urlParams.get('opcion') == "ver_libros_favoritos" ){
        alert('falta menos')
        contenedor_libro.innerHTML = "Pendiente Lista favoritos";
        let HTML = "";
        let id = 0;

        arreglo_libros_detalle = await request(`http://localhost/PARCIALES/PARCIAL_4/assets/php/lista_favoritos.php?user_id=1`);
       
        arreglo_libros_detalle.forEach(element => {
            console.log(element);
            HTML += obtener_libro( element.imagen_portada,element.titulo, element.descripcion, element.autor, "ND", element.google_book_id);
            id++
        })

        contenedor_libro.innerHTML = "";
        contenedor_libro.innerHTML = HTML;
        
    }else{
        contenedor_libro.innerHTML = "";
        contenedor_libro.innerHTML = listar_libros(arreglo_libros);
    }
    
}, 2000);

window.toggle_detalle = toggle_detalle;
window.arreglo_libros = arreglo_libros;
window.redirigir = redirigir;
window.agregar_favorito = agregar_favorito;
window.eliminar_favoritos = eliminar_favoritos



