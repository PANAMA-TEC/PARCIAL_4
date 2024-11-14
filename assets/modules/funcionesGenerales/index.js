export const validar_existencia_clase = (elemento, clase) => {
    return Array.from(elemento.classList).includes(clase);
}

export const toggle_element = (toToggle) => {
    if (validar_existencia_clase(toToggle, "open")){
        toToggle.classList.add("close");
        toToggle.classList.remove('open');

    }else{
        
        toToggle.classList.add("open");
        toToggle.classList.remove('close');
    }
}

export const redirigir = (mylink) => {
    // Redirigir a la página deseada
    window.location.href = mylink;
}


export const  HtmlEncode = (text) => {
    let mod_text = text;
    
    if(mod_text){
        mod_text = text.replaceAll('"', " ");
        mod_text = mod_text.replaceAll("'", " ");

        return mod_text;
        console.log(mod_text);
    }
    // return mod_text;
}
