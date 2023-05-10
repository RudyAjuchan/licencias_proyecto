@role('admin')
<x-header-admin />
<h4>Contenido LicenciaSystem</h4>
<x-footer-admin />
@endrole


@role('usuario')
<x-header-user />

<x-home />

<x-footer-user />
@endrole