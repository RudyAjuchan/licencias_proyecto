<x-header-admin />

<div class="container h-100 mt-5 pt-2 w-100">
    <div class="row">
        <div class="col-md-12">
            <h3 class="h3">Categorias</h3>
            <hr>
            <button type="button" class="btn btn-lic float-end" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                <i class="fas fa-plus-circle"></i> Nuevo
            </button>
            <br>            
            <div class="table-responsive mt-3">
                <table class="table mt-4 table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Id categoria</th>
                            <th>Nombre</th>
                            <th>creado</th>
                            <th>editado</th>                            
                            <th>Acciones</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($categorias as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->nombre}}</td>
                                <td>{{$cat->created_at}}</td>
                                <td>{{$cat->updated_at}}</td>
                                <td class="text-center" >   
                                    <a href="{{ url('categorias',[$cat]) }}" class="btn btn-warning bg-warning" style="font-size: 1.2rem"><i class='bx bxs-edit-alt' ></i></a>                                 
                                    <button type="button" class="btn btn-danger bg-danger" style="font-size: 1.2rem" onclick="eliminar({{ $cat->id }})">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </button>
                                    <form method="POST" action="{{ url('categorias', [$cat->id]) }}" name="formD" id="formD">
                                        @method('DELETE')
                                        @csrf            
                                        <button class="btn" id="buttonSubmit{{ $cat->id }}"></button>                            
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
    <div class="modal fade" id="modalCategoria" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Registro de Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formI" method="POST" action="{{ url('categorias') }}">
                @csrf
                <div class="modal-body">                
                        <div class="icono">
                            <label for="nombre">Nombre:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="nombre" type="text" class="form-control ps-5 mb-3" placeholder="Ingrese el nombre de la categoria" >
                            <div class="invalid-feedback">
                                Por favor complete este campo
                            </div>                  
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