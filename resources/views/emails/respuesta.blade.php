<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Factura</h2>
    <p><b>Cliente: </b>{{ $cliente }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>Total cancelado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
    </table>
    Tu compra ha sido completada, por favor revisa tu correo y se te ha enviado el link de la licencia <br>
    ¡Gracias por tu compra! <br>
    @php
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo 'Su clave es la siguiente: '.$randomString;
    @endphp
</body>
</html>