<x-header-user2 />
    <div class="container h-100 mt-5 pt-2 w-100">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-5">
                <h3 class="h3">Licencias para Windows</h3>
            </div>
            @foreach ($licencias as $lic)
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($lic->imagen) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lic->nombre }}</h5>
                            <p class="card-text">{{ $lic->descripcion }}</p>
                            <span>Precio Q.{{ $lic->precio }}</span>
                            <a href="#" class="btn btn-primary btn-block">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<x-footer-user />