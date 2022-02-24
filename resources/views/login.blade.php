<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Escenario #2</title>
    </head>
    <body>
        <form method="POST" action="/logIn" style="text-align: center;">
            @csrf
            <h1>LogIn</h1>
            <input type="text" placeholder="email" name="email" id="email"><br><br>
            <input type="password" placeholder="password" name="password" id="password"><br><br>
            <button type="submit">LogIn</button><a href="register">Registrarse</a>
        </form>
    </body>
</html>