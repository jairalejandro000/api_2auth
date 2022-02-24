<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Escenario #2</title>
    </head>
    <body>
        <form method="POST" action="/create" style="text-align: center;">
            <h1>Registrarse</h1>
            @csrf
            <input type="name" placeholder="name" name="name" id="name"><br><br>
            <input type="text" placeholder="email" name="email" id="email"><br><br>
            <input type="password" placeholder="password" name="password" id="password"><br><br>
            <button type="submit">Guardar</button><a href="/">LogIn</a>
        </form>
    </body>
</html>