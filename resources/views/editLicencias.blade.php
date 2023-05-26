<x-header-admin />
<div class="container h-100 mt-5 pt-2 w-100">
    <div class="row">
        <div class="col-md-12">
            <form id="formI" method="POST" action="{{ url('licencias', [$licencias]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf              
                        <div class="icono">
                            <label for="nombre">Nombre:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="nombre" type="text" class="form-control ps-5 mb-3" placeholder="Ingrese el nombre" value="{{ $licencias->nombre }}">                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Precio:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="precio" type="number" class="form-control ps-5 mb-3" placeholder="Ingrese el precio" value="{{ $licencias->precio }}">                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Stock:</label>
                            <i class='bx bx-rename'></i>
                            <input required name="stock" type="number" class="form-control ps-5 mb-3" placeholder="Ingrese stock" value="{{ $licencias->stock }}">                 
                        </div>
                        <div class="icono">
                            <label for="nombre">Descripción:</label>                            
                            <textarea required name="descripcion" id="" cols="30" rows="5" placeholder="Ingrese descripción" class="form-control">{{ $licencias->descripcion }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre">Estado:</label>                            
                                <select required name="estado" id="estado" class="form-control">
                                    <option value="" disabled selected hidden>Seleccione Estado</option>
                                    @if($licencias->estado==1)
                                        <option value="1" selected="selected">Activo</option>
                                    @else
                                        <option value="1">Activo</option>
                                    @endif

                                    @if($licencias->estado==0)
                                        <option value="0" selected="selected">Desactivo</option>
                                    @else
                                        <option value="0">Desactivo</option>
                                    @endif                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre">Categoría:</label>
                                <select required name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="" disabled selected hidden>Seleccione Categoría</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}"
                                        @if($cat->id == $licencias->categoria_id)
                                            selected="selected"
                                        @endif    
                                        >{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="{{ asset($licencias->imagen) }}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="icono mt-4">
                            <label for="nombre">Imagen:</label>                            
                            <input name="imagen" type="file" class="form-control ps-5 mb-3" accept="image/*">                 
                            @error('imagen')                                                                
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-lic mt-4">Actualizar</button>                        
                </form>
        </div>
    </div>
</div>


<x-footer-admin />