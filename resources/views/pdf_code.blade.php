<!doctype html>
<html lang="en">

<head>
    <title>Código</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="card"  style="width: 100%;">
            <div class="m-3">
                <div class="d-flex justify-content-center">
                    <h1>¡Hola <b>{{$data->name}}</b>!</h1>
                </div>
                <div class="mb-3">
                    <label class="form-label">Por favor ingresa el código <b>{{$data->code}}</b> para poder iniciar sesión</label>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

