<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Escenario #2 Código</title>
    </head>
    <body>
        <div class="container d-flex  justify-content-center">
            <div class="card m-3 "  style="width: 28rem;">
                <div class="m-3">
                    <form method="POST" action="/code">
                        <div class="d-flex justify-content-center">
                            <h1>Ingresa tu código</h1>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico a ingresar</label>
                            <input class="form-control" name="email" id="email" placeholder="{{$email}}" name="email" id="email" value="{{$email}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password"  class="form-label">Código recibido</label>
                            <input type="text" max="5" min="5" class="form-control" id="code" name="code" placeholder="Ingresa tu código">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
