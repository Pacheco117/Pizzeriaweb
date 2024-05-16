const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1');
const lista = document.querySelector("#lista-carrito tbody");
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
const verpedido = Document.getElementById('ver-pedido');

cargarEventListeners();

function cargarEventListeners(){
    elementos1.addEventListener('click', comprarElemento);
    carrito.addEventListener('click', eliminarElemento);
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

function comprarElemento(e){
    e.preventDefault();
    if(e.target.classList.contains('agregar-carrito')){
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }
}

function leerDatosElemento(elemento){
    const infoElemento={
        imagen: elemento.querySelector('img').src,
        titulo: elemento.querySelector('h3').textContent,
        precio: elemento.querySelector('.precio').textContent,
        id: elemento.querySelector('a').getAttribute('data-id')
    }
    insertarCarrito(infoElemento);
}

function insertarCarrito(elemento){
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <img src="${elemento.imagen}" width=100 >
        </td>
        <td>
            ${elemento.titulo}
        </td>
        <td>
            ${elemento.precio}
        </td>
        <td>
            <a href="#" class="borrar" data-id="${elemento.id}"> X </a>
        </td>
    
    `;
    lista.appendChild(row);

}

function eliminarElemento(e){
    e.preventDefault();
    let elemento,
        elementoId;
    if(e.target.classList.contains('borrar')){
        e.target.parentElement.parentElement.remove();
        elemento = e.target.parentElement.parentElement;
        elementoId = elemento.querySelector('a').getAttribute('data-id');
    }
}

function vaciarCarrito(){
    while(lista.firstChild){
        lista.removeChild(lista.firstChild);
    }
    return false;
}

 // JavaScript para manejar el evento de clic en el botón Agregar
 document.querySelectorAll('.agregar-carrito').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const productId = this.getAttribute('data-id');
        // Enviar una solicitud AJAX al servidor para agregar el producto al carrito
        fetch('agregar_al_carrito.php?id=' + productId)
            .then(response => {
                if (response.ok) {
                    alert('Producto agregado al carrito');
                } else {
                    alert('Error al agregar el producto al carrito');
                }
            });
    });
});

function agregarCompra() {
    
    // Obtener los datos del carrito
    var pizza = document.getElementById("pizza").value; 
    var nombre = document.getElementById("nombre").value; 
    var precio = document.getElementById("precio").value; 

  
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "validar_compra.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            alert(xhr.responseText);
        } else {
            alert('Hubo un problema al procesar la compra.');
        }
    };

    xhr.send("pizza=" + pizza + "&nombre=" + nombre + "&precio=" + precio);
}















