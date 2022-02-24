<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Escenario #2</title>
    </head>
    <body>
        <form method="POST" action="/code" style="text-align: center;">
            @csrf
            <h1>Código</h1>
            <input name="email" id="email">
            <input type="text" max="5" min="5" placeholder="code" name="code" id="code"><br><br>
            <button type="submit">Iniciar sesion</button>
        </form>
    </body>
</html>