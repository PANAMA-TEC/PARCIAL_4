export const libros = (imagen, titulo_libro, descripcion, autor, ano_publicacion, my_book_id, resena_personal) => {
    
    return `
        <div  class="libro_contenedor_general">
            
            <div class='libro' >   
                
                
                <div class='libro_caratula_inferior'> 
                
                </div>

                <div class="libro_paginas" >

                </div>

                <div id='book_${my_book_id}' class="libro_portada libro_imagen" 
                    onclick="toggle_detalle('${titulo_libro}', '${descripcion}','${imagen}', '${autor}', '${ano_publicacion}', '${my_book_id}','${resena_personal}')" 
                    style="background-image: url('${imagen}');">
                </div>
            
            </div>

            <div class='libro_titulo'>
                ${titulo_libro}
            </div>
        

        </div>
    
    `;
} 