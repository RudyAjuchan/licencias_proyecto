$(document).ready(function () {
    var characterCount
    $('#expiracion').on('input', function (e) {
        if ($(this).val().length == 2 && characterCount < $(this).val().length) {
            $(this).val($(this).val() + '/');
        }
        characterCount = $(this).val().length
    });
    agregarInputCarrito();
});

/* const cards = document.getElementById('cards') */
const items = document.getElementById('items2')
const footer = document.getElementById('footer2')
/* const templateCard = document.getElementById('template-card').content */
const templateFooter = document.getElementById('template-footer2').content
const templateCarrito = document.getElementById('template-carrito2').content
const fragment = document.createDocumentFragment()
let carrito = {}
var contCarrito = 0;

$(document).ready(function () {    
    carrito = JSON.parse(localStorage.getItem('carrito'))
    pintarCarrito()
});
// Eventos

/* cards.addEventListener('click', e => { addCarrito(e) }); */
items.addEventListener('click', e => { btnAumentarDisminuir(e) })


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
    const nPrecio = Object.values(carrito).reduce((acc, { cantidad, precio }) => acc + cantidad * precio, 0)
    // console.log(nPrecio)

    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio

    const clone = templateFooter.cloneNode(true)
    fragment.appendChild(clone)

    footer.appendChild(fragment)

    document.getElementById("contCarrito").textContent = nCantidad;
    if (nCantidad > 0) {
        $("#icon-carrito").css("color", "#51FE44");
    }

    const boton = document.querySelector('#vaciar-carrito')
    boton.addEventListener('click', () => {
        carrito = {}
        document.getElementById("contCarrito").textContent = 0;
        if (nCantidad > 0) {
            $("#icon-carrito").css("color", "white");
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
            carrito[e.target.dataset.id] = { ...producto }
        }
        pintarCarrito()
    }
    e.stopPropagation()
}

const agregarInputCarrito = () => {
    carrito = localStorage.getItem('carrito');
    document.getElementById("carrito_content").value = carrito;
}

const enviarPago = () => {
    var formData = new FormData(document.getElementById('formPagar'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/procesoCompra",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (response) {
        console.log(response);
        
        // total venta        
        const nPrecio = Object.values(carrito).reduce((acc, { cantidad, precio }) => acc + cantidad * precio, 0)
        var pago =
        {
            "businessID": "blhK6e8GmpLis7gJ2XXT",
            "paymentType": "card",
            "amount": nPrecio,
            "cardDetails": {
                "cardNumber": "4444555566667028",
                "expirationDate": "05/2028",
                "cvv": "603"
            }
        }
        axios({
            method: 'post',
            url: 'https://app-ryypjkir5a-uc.a.run.app/payments/create',
            data: pago
        }).then(function (response) {
            carrito = localStorage.setItem('carrito',{});
            swal({
                icon: 'success',
                title: 'Atención',
                text: '¡Compra realizada con éxito!',
            }).then(function () {	        
                window.location.href = "/";
            }); 
        });
    });
}
