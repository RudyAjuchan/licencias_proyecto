<x-header-user2 />
    <div class="container h-100 mt-5 pt-2 w-100">
        <div class="row" id="cards">
            @foreach ($licencias as $lic)
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset($lic->imagen) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lic->nombre }}</h5>
                            <p class="card-text">{{ $lic->descripcion }}</p><br>
                            <b>Precio Q. <span>{{ $lic->precio }}</span></b>
                            <button data-id="{{ $lic->id }}" class="btn btn-primary btn-block mt-3" id="btn-compra">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<x-footer-user />