export const mostrar_detalles_libros = (titulo, descripcion, imagen, autor, ano, id) => {
    
    descripcion = !descripcion ? `
        Este libro, aunque aún no tiene una descripción detallada, guarda en sus páginas una historia única esperando ser descubierta. A veces, las mejores aventuras son aquellas que no se pueden resumir en unas pocas palabras. Te invitamos a abrir sus páginas y sumergirte en una narrativa que solo tú podrás experimentar. ¿Qué secretos esconde? Solo al leerlo podrás saberlo.    
    ` : descripcion;

    imagen = imagen ? imagen : "http://localhost/PARCIALES/PARCIAL_4/assets/images/test_portada.jpg";

    return `
        
        <div class="detalle_libro_contenedor row">

            <img src='${imagen}' width=60%;' style=''>

            <div class="detalle_libro_detalles col" style="position: relative;">

                <div class="detalle_libro_detalles_informacion col">

                    <label class="detalle_libro_detalles_informacion_titulo row">

                        <b>${titulo}</b>

                    </label>

                    <div class="detalle_libro_detalles_informacion_descripcion">
                        ${descripcion}

                        </div>

                    <div class="detalle_libro_detalles_informacion_otros col">
                        <div class="detalle_libro_detalles_informacion_autor"><b>Autor del Libro:</b> ${autor} </div>
                        <div class="detalle_libro_detalles_informacion_anop"><b>A-o de publicacion:</b> ${ano} </div>
                    </div>

                </div>

                <div class="detalle_libro_detalles_opciones row">

                    <svg id='agregar_favorito_${id}' onclick='agregar_favorito(this.id)' class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>


                    <label style="font-weight: bold;"> Agregar a favoritos</label>

                </div>

                <div id='close_detalle' class="detalle_libro_close_tag" onclick='toggle_detalle()'>
                    <svg class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                    </svg>
                </div>

            </div>
        </div>
    
    
    `
    
}