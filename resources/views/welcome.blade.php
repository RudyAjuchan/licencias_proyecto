@if (Route::has('login'))
    @auth
        <script>window.location = "/dashboard";</script>
    @else
        @role('admin')
        <x-header-admin />
        <div class="container-fluid h-100 mt-5 pt-2">
            <div class="row">
                <div class="col-md-12">
                <h4>Inicio</h4>
                </div>
            </div>
        </div>
        <x-footer-admin />
        @else
        <x-header-user />
        
        <x-home />
        
        <x-footer-user />
        @endrole    
    @endauth
@endif