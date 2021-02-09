<?php
session_start();
require_once(__DIR__."/controllers/cabanas.controller.php");
require_once(__DIR__."/controllers/sesion.controller.php");

if(!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administración - Colibri</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  
    <script>
    document.addEventListener('DOMContentLoaded', e => {
        var formulario = document.getElementById('formulario');
        formulario.addEventListener('submit', e => {
            e.preventDefault();

            var params_login = {
            cabana: document.getElementById('cabana').value,
            start: document.getElementById('start').value,
            end: document.getElementById('end').value,
            cliente: document.getElementById('cliente').value,
            celularCliente: document.getElementById('celularCliente').value,
            valorReserva: document.getElementById('valorReserva').value
            }

            url = './ajax/save_reservas.php';
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.addEventListener('load', data => {

            if(xhr.status == 200) {
                
                var response = JSON.parse(data.target.response);

                if(response.success) {
                    document.getElementById("alert_danger").style.display = 'none';
                    document.getElementById("alert_success").style.display = '';
                  
                } else {
                    document.getElementById("alert_success").style.display = 'none';
                    document.getElementById("alert_danger").style.display = '';
                    document.getElementById("alert_danger").innerText = response.msg;
                }
            } else {
                console.log("error");
            }

            });

            xhr.send(JSON.stringify(params_login));
        });

        document.getElementById("cerrarSesion").addEventListener('click', e => {
            
            var signout = {
            cabana: document.getElementById('cabana').value,
            start: document.getElementById('start').value,
            end: document.getElementById('end').value,
            cliente: document.getElementById('cliente').value,
            celularCliente: document.getElementById('celularCliente').value,
            valorReserva: document.getElementById('valorReserva').value
            }

            url = 'ajax/signout.php';
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.addEventListener('load', data => {

            if(xhr.status == 200) {
                
                var response = JSON.parse(data.target.response);

                if(response.success) {
                    window.location = "login.php";
                } else {
                    console.log('ola');
                }
            } else {
                console.log("error");
            }

            });

            xhr.send(JSON.stringify(signout));
        });
    });


    </script>
</head>
  <body>
    <div class="btn-own">
      <span class="fas fa-bars"></span>
    </div>
    <nav class="sidebar">
      <div class="text">Administración</div>
      <ul>
        <!-- <li class="active"><a href="#">Dashboard</a></li> -->
        <li>
          <a href="#" class="feat-btn">Reservas
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
            <li><a href="admin.php">Reservar</a></li>
            <li><a href="eliminar_reserva.php">Eliminar reserva</a></li>
          </ul>
        </li>
        <li><a href="#">Contacto</a></li>
        <li><a id="cerrarSesion" href="#">Cerrar sesión</a></li>
      </ul>
    </nav>
    <div class="container min-vh-100">
      <div class="row justify-content-center align-items-center min-vh-100">
          <div class="col-10 bg-light p-5">
              <form id="formulario">
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Cabaña</label>
                    <div class="col-sm-10">
                        <select type="text" id="cabana" class="form-control" placeholder="Seleccione la cabaña">
                            <?php foreach ($cabanas as $dato) { ?>
                            <option value="<?php echo $dato['id']?>"><?php echo $dato["nombre"];?></option>
                            <?php } ?>
                        </select>    
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Fecha Inicio</label>
                    <div class="col-sm-10">
                        <input type="date" id="start" class="form-control" placeholder="Seleccione la cabaña" required/> 
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Fecha Fin</label>
                    <div class="col-sm-10">
                        <input type="date" id="end" class="form-control" placeholder="Seleccione la cabaña" required/> 
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Nombre Cliente</label>
                    <div class="col-sm-10">
                        <input type="text" id="cliente" class="form-control" placeholder="Ingrese el nombre del cliente" required/> 
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Celular Cliente</label>
                    <div class="col-sm-10">
                        <input type="number" id="celularCliente" class="form-control" placeholder="Ingrese el celular del cliente" required/> 
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label for="user" class="col-sm-2 col-form-label">Valor Reserva</label>
                    <div class="col-sm-10">
                        <input type="number" id="valorReserva" class="form-control" placeholder="Ingrese el valor de la reserva" required/> 
                    </div>
                  </div>
                  <div id="button" class="form-group row p-1 mt-4 justify-content-center">
                    <div style="display:none" id="alert_success" class="alert alert-success" role="alert">
                        Reserva realizada con éxito
                    </div>
                    <div style="display:none" id="alert_danger" class="alert alert-danger" role="alert">
                        
                    </div>
                    <button type="submit" class="col-10 btn btn-primary">Realizar Reserva</button>
                  </div>
              </form>
          </div>
      </div>
    </div>

    <script>
    $('.btn-own').click(function(){
      $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    });
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
      $('.btn-own').trigger("click");
    </script>

  </body>
</html>
