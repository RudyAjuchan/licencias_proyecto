const cards = document.getElementById('cards')
const items = document.getElementById('items')
const footer = document.getElementById('footer')
/* const templateCard = document.getElementById('template-card').content */
const templateFooter = document.getElementById('template-footer').content
const templateCarrito = document.getElementById('template-carrito').content
const fragment = document.createDocumentFragment()
let carrito = {}
var contCarrito=0;

$(document).ready(function(){
    carrito = JSON.parse(localStorage.getItem('carrito'))
    if(carrito){
        const cantidadCarrito = Object.values(carrito).reduce((acc, { cantidad }) => acc + cantidad, 0);
    document.getElementById("contCarrito").textContent=cantidadCarrito;
    if(cantidadCarrito>0){
        $("#icon-carrito").css("color","#51FE44");
    }
    }    
    pintarCarrito()
});
// Eventos

cards.addEventListener('click', e => { addCarrito(e) });
items.addEventListener('click', e => { btnAumentarDisminuir(e) })



// Agregar al carrito
const addCarrito = e => {
    console.log("si pasa");
    if (e.target.classList.contains('btn-primary')) {
        // console.log(e.target.dataset.id)
        // console.log(e.target.parentElement)
        setCarrito(e.target.parentElement)
    }
    swal({
        icon: 'success',
        title: 'Atención',
        text: '¡Se agregó producto, revise su carrito!',
    }).then(function () {	        
        $("#modalCarrito").modal("show");
    }); 
    e.stopPropagation()
}

const setCarrito = item => {
    // console.log(item)
    const producto = {
        title: item.querySelector('h5').textContent,
        precio: item.querySelector('span').textContent,
        id: item.querySelector('button').dataset.id,
        cantidad: 1
    }
    // console.log(producto)
    if (carrito.hasOwnProperty(producto.id)) {
        producto.cantidad = carrito[producto.id].cantidad + 1
    }

    carrito[producto.id] = { ...producto }
    
    pintarCarrito()
}

const pintarCarrito = () => {
    items.innerHTML = ''

    Object.values(carrito).forEach(producto => {
        templateCarrito.querySelector('th').textContent = producto.id
        templateCarrito.querySelectorAll('td')[0].textContent = producto.title
        templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad
        templateCarrito.querySelector('span').textContent = producto.precio * producto.cantidad
        
        //botones
        templateCarrito.querySelector('.btn-info').dataset.id = producto.id
        templateCarrito.querySelector('.btn-danger').dataset.id = producto.id

        const clone = templateCarrito.cloneNode(true)
        fragment.appendChild(clone)
    })
    items.appendChild(fragment)

    pintarFooter()
    localStorage.setItem('carrito', JSON.stringify(carrito))
}

const pintarFooter = () => {
    footer.innerHTML = ''
    
    if (Object.keys(carrito).length === 0) {
        footer.innerHTML = `
        <th scope="row" colspan="5">Carrito vacío con innerHTML</th>
        `
        return
    }
    
    // sumar cantidad y sumar totales
    const nCantidad = Object.values(carrito).reduce((acc, { cantidad }) => acc + cantidad, 0)
    const nPrecio = Object.values(carrito).reduce((acc, {cantidad, precio}) => acc + cantidad * precio ,0)
    // console.log(nPrecio)

    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio

    const clone = templateFooter.cloneNode(true)
    fragment.appendChild(clone)

    footer.appendChild(fragment)    

    document.getElementById("contCarrito").textContent=nCantidad;
    if(nCantidad>0){
        $("#icon-carrito").css("color","#51FE44");
    }

    const boton = document.querySelector('#vaciar-carrito')
    boton.addEventListener('click', () => {
        carrito = {}
        document.getElementById("contCarrito").textContent=0;
        if(nCantidad>0){
            $("#icon-carrito").css("color","white");
        }
        pintarCarrito()
    })

}

const btnAumentarDisminuir = e => {
    // console.log(e.target.classList.contains('btn-info'))
    if (e.target.classList.contains('btn-info')) {
        const producto = carrito[e.target.dataset.id]
        producto.cantidad++
        carrito[e.target.dataset.id] = { ...producto }
        pintarCarrito()
    }

    if (e.target.classList.contains('btn-danger')) {
        const producto = carrito[e.target.dataset.id]
        producto.cantidad--
        if (producto.cantidad === 0) {
            delete carrito[e.target.dataset.id]
        } else {
            carrito[e.target.dataset.id] = {...producto}
        }
        pintarCarrito()
    }
    e.stopPropagation()
}

