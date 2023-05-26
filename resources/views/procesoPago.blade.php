<x-header-user2 />    
    <div class="container px-4 py-4">
        <div class="row">
            <div class="col-md-7">
                <div class="container">
                    <h4>Lista de productos</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="items2"></tbody>
                        <tfoot>
                            <tr id="footer2">
                                <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                            </tr>
                        </tfoot>
                    </table>                    
                    
                </div>

                <template id="template-footer2">
                    <th scope="row" colspan="2">Total productos</th>
                    <td>10</td>
                    <td>
                        <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                            vaciar todo
                        </button>
                    </td>
                    <td class="font-weight-bold">Q <span>5000</span></td>
                </template>

                <template id="template-carrito2">
                    <tr>
                        <th scope="row">id</th>
                        <td>Café</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-info btn-sm">
                                +
                            </button>
                            <button class="btn btn-danger btn-sm">
                                -
                            </button>
                        </td>
                        <td>Q <span>500</span></td>
                    </tr>
                </template>
            </div>

            <div class="col-md-5">
                <h1 class="text-center"><b>Complete sus datos para proceder a pagar</b></h1>
                <form id="formPagar">                
                <input type="hidden" name="carrito_content" id="carrito_content">
                    <label for="">Seleccione tipo de pago</label>
                    <select name="tipoPago" id="tipoPago">
                        <option value="card">Tarjeta de débito</option>
                        <option value="cheque">Cheque</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                    <div class="icono">
                        <label for="nombre">Nombre:</label>
                        <i class='bx bx-rename'></i>
                        <input required name="nombre" type="text" class="form-control ps-5 mb-3" placeholder="Ingrese el nombre" >                 
                    </div>
                    <div class="icono">
                        <label for="nombre">No Tarjeta:</label>
                        <i class='bx bx-rename'></i>
                        <input required name="no_tarjeta" type="number" class="form-control ps-5 mb-3" placeholder="Ingrese el Número de tarjeta" >                 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icono">
                                <label for="nombre">Fecha expiración:</label>
                                <i class='bx bx-rename'></i>
                                <input required name="expiracion" id="expiracion" type="text" class="form-control ps-5 mb-3" placeholder="12/2022" >                 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icono">
                                <label for="nombre">CVC:</label>
                                <i class='bx bx-rename'></i>
                                <input required name="cvc" id="cvc" type="number" class="form-control ps-5 mb-3" placeholder="CVC" >                 
                            </div>
                        </div>                        
                    </div>
                    <div class="icono">
                        <label for="nombre">Telefono:</label>
                        <i class='bx bx-rename'></i>
                        <input required name="telefono" id="telefono" type="text" class="form-control ps-5 mb-3" placeholder="+502 29304982" >                 
                    </div>
                    <div class="icono">
                        <label for="nombre">Correo:</label>
                        <i class='bx bx-rename'></i>
                        <input required name="correo" id="correo" type="email" class="form-control ps-5 mb-3" placeholder="ejemplo@gmail.com" >                 
                    </div>

                    <button type="button" class="btn btn-success btn-block" onclick="enviarPago();">Pagar</button>                    
                </form>
            </div>
        </div>
    </div>

<x-footer-user2 />