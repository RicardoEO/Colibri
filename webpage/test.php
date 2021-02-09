<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="cabañas en chillan"/>
    <meta name="keywords" content="cabañas en chillan, cabañas camino a termas de chillan, termas de chillan"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cabañascolibri.cl/webpage/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <title>Cabañas Colibri</title>
    <script>
      window.addEventListener('scroll', function(e) {
        /* console.log(document.documentElement.scrollTop); */
        /* console.log(window.pageYOffset); */
        var nav = document.getElementById("nav");
        var scrollY = window.scrollY;
        var vw = window.innerHeight;
        if(scrollY >= vw) {
          nav.style.backgroundColor = 'rgba(0, 0, 0, 1)';
        } else {
          nav.style.backgroundColor = 'rgba(0, 0, 0, 0.116)';
        }
      });

      document.addEventListener("DOMContentLoaded", e => {
        var btnScroll = document.getElementById("ver-cabanas").addEventListener('click', function(e) {
            var cabanas = document.getElementById("cabanasId").scrollIntoView({block: "start", behavior: "smooth"});
        });

        var navScroll = document.getElementById("ver-cabanas").addEventListener('click', function(e) {
            var cabanas = document.getElementById("cabanasId").scrollIntoView({block: "start", behavior: "smooth"});
        });

        document.getElementById("form_contacto").addEventListener('submit', e => {
          e.preventDefault();

          var params_login = {
          usuario: document.getElementById('nombre').value,
          email: document.getElementById('email').value,
          celular: document.getElementById('celular').value,
          mensaje: document.getElementById('mensaje').value
          }

          url = './email.php';
          var xhr = new XMLHttpRequest();
          xhr.open('POST', url);
          xhr.addEventListener('load', data => {

          if(xhr.status == 200) {
              var login = JSON.parse(data.target.response);
              if(login.status) {
                  alert("Correo enviado, pronto nos contactaremos con usted");
              } else {
                console.log("error");
              }
          } else {
              console.log('error');
          }

          });

          xhr.send(JSON.stringify(params_login));
        });
      })

    </script>
</head>
<body class="bg-light">
    <nav id="nav" class="navbar fixed-top pt-1 navbar-expand-lg navbar-dark">
        <a href="#" class="ml-4 logo navbar-brand text-white">cabañas colibrí</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="mr-5 nav-item w-100">
                    <a href="#" class="text-light nav-link">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="#cabanasId" class="text-light nav-link">Cabañas</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="#" class="text-light nav-link">Ubicación</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="#contacto" class="text-light nav-link">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
<section class="banner">
  <div class="banner-content">
    <h1 class="text-center">Disfruta de un entorno natural</h1>
    <p class="subtitle">Cabañas totalmente equipadas, camino a las termas de Chillán</p>
    <button id="ver-cabanas">Ver Cabañas</button>
  </div>
</section>
<div class="container-fluid bg-light">
  <div id="cabanasId" class="p-5 cabanas row row-no-padding h-100 bg-light d-flex justify-content-center">
    <div class="nuestras-cabanas col-12 p-5 text-center">
      <h1 class="title">NUESTRAS CABAÑAS</h1>
      <div class="row">
      <div class="col-12">
        <p class="descripcion pt-4">Colibri es un complejo turistico que ofrece comodidad, piscinas, tinaja de hidromasaje y juegos infantiles.
        <br> Inmersas en un bosque nativo. Ideales para el descanso y la recreación en familia.</p>
      </div>
    </div>
    </div>
    <?php require_once(__DIR__."/controllers/cabanas.controller.php");
    foreach($cabanas as $cabana) {?>
    <div class="no-padding col-2">
      <img class="no-padding img-cabana" src="https://cabañascolibri.cl/webpage/images/cabana<?php echo $cabana['id'];?>.jpg" alt="">
      <div class="cabana">
        <h1 class="nombre-cabana text-light"><?php echo utf8_encode($cabana['nombre']); ?></h1>
      </div>
      <div class="divinfo cabana">
        <a class="btn btninfo text-light" href="https://cabañascolibri.cl/cabana/<?php echo $cabana['id'];?>">+Info</a>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="row justify-content-center contacto">
      <div class="col-md-6 pb-4">
        <h1 id="contacto" class="text-center pt-4 pb-4 title">CONTACTO</h1>
        <form id= "form_contacto">
        <div class="form-group">
            <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Ingrese su nombre" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="celular" placeholder="Ingrese su celular" required>
          </div>
          <div class="form-group">
            <textarea type="password" class="form-control" id="mensaje" placeholder="Ingrese su mensaje"></textarea>
          </div>
          <button type="submit" class="w-100 btn shop-button mb-4">Enviar mensaje</button>
        </form>
      </div>
  </div>
</div>

<footer>   
  <div class="container-footer-all">
        <div class="container-body">
          <div class="colum1">
               <h1>Más información de la compañia</h1>

               <p>Esta compañia se dedica a la venta de software integrado con un 
               conjunto de cosas que no se lo que estoy escribiendo, este 
               texto es solo para llenara informacion en el cuadro de informacion 
               de la compañia.</p>
          </div>

          <div class="colum2">

              <h1>Redes Sociales</h1>

              <div class="fila">
                  <img src="https://cabañascolibri.cl/webpage/icon/facebook.png">
                  <label>Siguenos en Facebook</label>
              </div>
              <div class="fila">
                  <img src="https://cabañascolibri.cl/webpage/icon/twitter.png">
                  <label>Siguenos en Twitter</label>
              </div>
              <div class="fila">
                  <img src="https://cabañascolibri.cl/webpage/icon/instagram.png">
                  <label>Siguenos en Instagram</label>
              </div>
              <div class="fila">
                  <img src="https://cabañascolibri.cl/webpage/icon/google-plus.png">
                  <label>Siguenos en Google Plus</label>
              </div>
              <div class="fila">
                  <img src="https://cabañascolibri.cl/webpage/icon/pinterest.png">
                  <label>Siguenos en Pinterest</label>
              </div>
          </div>

          <div class="colum3">

              <h1>Información Contactos</h1>

              <div class="fila2">
                  <img src="https://cabañascolibri.cl/webpage/icon/house.png">
                  <label>Comuna de Pinto, 
                  camino a las termas de Chillán,
                  Chile</label>
              </div>

              <div class="fila2">
                  <img src="https://cabañascolibri.cl/webpage/icon/smartphone.png">
                  <label>+56985233252</label>
              </div>

              <div class="fila2">
                  <img src="https://cabañascolibri.cl/webpage/icon/contact.png">
                  <a href="mailto:Herrmau@vtr.net"><label>Herrmau@vtr.net</label></a>
              </div>
          </div>
      </div>
    </div>
   
    <div class="container-footer">
      <div class="footer">
            <div class="copyright">
                  © 2021 Todos los Derechos Reservados | <a href="mailto:ricardoecheverriaortiz@gmail.com">DreamDevelop</a>
              </div>

              <div class="information">
                  <a href="">Información Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Términos y Condiciones</a>
              </div>
          </div>
      </div>
</footer>
</body>
</html>