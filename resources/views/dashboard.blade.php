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
@endrole


@role('usuario')
<x-header-user />

<x-home />

<x-footer-user />
@endrole