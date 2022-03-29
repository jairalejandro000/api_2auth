<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Escenario #4 Iniciar sesión</title>
    </head>
    <body>
        <div class="container d-flex  justify-content-center">
            <div class="card m-3 "  style="width: 28rem;">
                <div class="m-3">
                    <form method="POST" action="/logIn">
                        <div class="d-flex justify-content-center">
                            <h1>Inicia sesión</h1>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary">Iniciar sesión</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-link" href="register" role="button" style="color: #ABDEE1;">No tengo cuenta</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('pdf_code') }}" class="btn btn-success btn-sm">Export to PDF</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('sent_pdf_code') }}" class="btn btn-success btn-sm">Sent to SPACES</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

