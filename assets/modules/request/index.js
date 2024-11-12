export  const request = (url) => {

    fetch(url).then(response => {
        if (!response.ok) {
        throw new Error('Error en la solicitud');
        }
        return response.json(); // Convierte la respuesta a JSON
    }).then(data => {
        return data; // Trabaja con los datos aquí
    }).catch(error => {
        console.error('Error:', error);
    });

}