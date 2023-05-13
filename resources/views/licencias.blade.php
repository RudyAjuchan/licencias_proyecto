<x-header-admin />

<div class="container h-100 mt-5 pt-2 w-100">
    <div class="row">
        <div class="col-md-12">
            <h3 class="h3">Licencias</h3>
            <hr>
            <button type="button" class="btn btn-lic float-end" data-bs-toggle="modal" data-bs-target="#modalRegistro">
                <i class="fas fa-plus-circle"></i> Nuevo
            </button>
            <br>            
            <div class="table-responsive mt-3">
                <table class="table mt-4 table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Id licencia</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>                            
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Categoría</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($licencias as $lic)
                            <tr>
                                <td>{{$lic->id}}</td>
                                <td>{{$lic->nombre}}</td>
                                <td>{{$lic->precio}}</td>
                                <td>{{$lic->stock}}</td>
                                <td>{{$lic->descripcion}}</td>
                                <td><img src="{{ asset($lic->imagen)}}" alt="" width="70" height="70"></td>
                                <td>{{$lic->estado}}</td>
                                <td>{{$lic->categoria->nombre}}</td>
                                <td>{{$lic->created_at}}</td>
                                <td>{{$lic->updated_at}}</td>
                                <td class="text-center" >   
                                    <a href="{{ url('licencias',[$lic]) }}" class="btn btn-warning bg-warning" style="font-size: 1.2rem"><i class='bx bxs-edit-alt' ></i></a>                                 
                                    <button type="button" class="btn btn-danger bg-danger" style="font-size: 1.2rem" onclick="eliminar({{ $lic->id }})">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </button>
                                    <form method="POST" action="{{ url('licencias', [$lic->id]) }}" name="formD" id="formD">
                                        @method('DELETE')
                                        @csrf            
                                        <button class="btn" id="buttonSubmit{{ $lic->id }}"></button>                            
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>



    <!-- Inicio del modal -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Registro de Licencias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formI" method="POST" action="{{ url('licencias') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">                
                        <div class="icono">
                            <label for="nombre">Nombre:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="nombre" type="text" class="form-control ps-5 mb-3" placeholder="Ingrese el nombre" >                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Precio:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="precio" type="number" class="form-control ps-5 mb-3" placeholder="Ingrese el precio" >                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Stock:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="stock" type="number" class="form-control ps-5 mb-3" placeholder="Ingrese stock" >                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Descripción:</label>                            
                            <textarea required name="descripcion" id="" cols="30" rows="5" placeholder="Ingrese descripción" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre">Estado:</label>                            
                                <select required name="estado" id="estado" class="form-control">
                                    <option value="" disabled selected hidden>Seleccione Estado</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Desactivo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre">Categoría:</label>
                                <select required name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="" disabled selected hidden>Seleccione Categoría</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="icono mt-4">
                            <label for="nombre">Imagen:</label>                            
                            <input required name="imagen" type="file" class="form-control ps-5 mb-3" accept="image/*">                 
                            @error('imagen')                                                                
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>                        
                </div>
                <div class="modal-footer">                
                    <button class="btn btn-lic">Guardar</button>                
                    <button type="button" class="btn btn-danger bg-danger" data-bs-dismiss="modal">Cancelar</button>                     
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Final del modal -->

<x-footer-admin />


<script>
function eliminar(id){
    swal({
                title: "¿Está seguro eliminar el dato",
                text: "Esta acción es irreversible",
                icon: "warning",
                buttons: {
                    confirm: { text: "Si deseo eliminarlo", className: "sweet-warning" },
                    cancel: "Cancelar",
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById("buttonSubmit"+id).click();
                } else {
                    swal("No se eliminó el dato");
                }
            });
}
</script>