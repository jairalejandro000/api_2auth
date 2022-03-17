<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Escenario #4 Registrarse</title>
    </head>
    <body>

        <div class="container d-flex  justify-content-center">
            <div class="card m-3 "  style="width: 28rem;">
                <div class="m-3">
                    <form method="POST" action="/create">
                        <div class="d-flex justify-content-center">
                            <h1>Crea una cuenta</h1>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Correo electrónico</label>
                            <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Ingresa un correo" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa una contraseña">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary">Registrarse</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-link" href="/" role="button" style="color: #ABDEE1;">Ya tengo una cuenta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
