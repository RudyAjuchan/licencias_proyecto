<x-header-admin />
<div class="container h-100 mt-5 pt-2 w-100">
    <div class="row">
        <div class="col-md-12">
            <form id="formI" method="POST" action="{{ url('categorias', [$categorias]) }}">
                @method('PUT')
                @csrf
                <div class="icono">
                    <label for="nombre">Nombre:</label>
                    <i class='bx bx-rename'></i>
                    <input required name="nombre" type="text" class="form-control ps-5 mb-3" value="{{ $categorias->nombre }}" placeholder="Ingrese el nombre de la categoria">
                    <div class="invalid-feedback">
                        Por favor complete este campo
                    </div>
                </div>
                <button class="btn btn-lic">Guardar</button>
                <button type="button" class="btn btn-danger bg-danger" data-bs-dismiss="modal">Cancelar</button>
            
            </form>
        </div>
    </div>
</div>


<x-footer-admin />