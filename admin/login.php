<!DOCTYPE html>
<html class="mw-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Login</title>
    <script>
    document.addEventListener('DOMContentLoaded', e => {
        var formulario = document.getElementById('formulario');
        formulario.addEventListener('submit', e => {
            e.preventDefault();

            var params_login = {
            usuario: document.getElementById('user').value,
            password: document.getElementById('password').value
            }

            url = './models/usuarios.model.php';
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.addEventListener('load', data => {

            if(xhr.status == 200) {
                var login = JSON.parse(data.target.response);
                if(login.status) {
                    window.location = "admin.php";
                }
            } else {
                console.log('error');
            }

            });

            xhr.send(JSON.stringify(params_login));
        });
    });
    </script>
</head>
<body class="h-100">
    <div class="container min-vh-100">
        <div class="row justify-content-center min-vh-100">
            <div class="col-12 align-self-center">
            <h2 class="text-center p-3">Sistema de Administración</h2>
                <div class="row justify-content-center">
                    <div class="col-6 bg-light p-5">
                    <form id="formulario">
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" id="user" class="form-control" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" class="form-control" placeholder="Contraseña">
                        </div>
                        <button type="submit" id="enviar" class="btn-block btn btn-primary">Iniciar sesión</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>