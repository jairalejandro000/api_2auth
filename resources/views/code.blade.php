<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Códiog de autenticación</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
    <div class="container py-5">
        <div class="card"  style="width: 100%;">
            <div class="m-3">
                <div class="d-flex justify-content-center">
                    <h1>¡Hola <b>{{$name}}</b>, gracias por registrarte!</h1>
                </div>
                <div class="mb-3">
                    <label class="form-label">Para ver tu código de atenticación da click <a href="{{ $link }}">aquí</a>, lo necesitarás para iniciar sesión.</label>
                </div>
                <div class="mb-3">
                    <label>Este link vence en 1 minuto.</label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
