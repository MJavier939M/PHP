//TO DO ACTIVIDAD.
addEventListener("DOMContentLoaded", (event) => {
    const inputsCantidad = document.querySelectorAll(".input-cantidad");
    console.log(inputsCantidad);
    for (inputCantidad of inputsCantidad) {
        inputCantidad.addEventListener('change', (evento)=>{
            console.log('ey you');
            console.log(evento.target.closest('li.list-group-item').querySelectorAll('.precioTotalItem'));
            
            evento.target.closest('li.list-group-item').querySelectorAll('.precioTotalItem').
            actualizarResto();
        });    
    }

    function actualizarResto(){
        let nuevaCantidadTotal = 3;
        let nuevoPrecioTotal = 3;

    }
    
});

