<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="cabañas en chillan"/>
    <meta name="keywords" content="cabañas en chillan, cabañas camino a termas de chillan, termas de chillan"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <title>Document</title>
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
            var cabanas = document.getElementById("cabanasId").scrollIntoView({block: "center", behavior: "smooth"});
        });

        var navScroll = document.getElementById("nav-cabana").addEventListener('click', function(e) {
            var cabanas = document.getElementById("cabanasId").scrollIntoView({block: "center", behavior: "smooth"});
        });

        var navScroll = document.getElementById("nav-comunes").addEventListener('click', function(e) {
            var cabanas = document.getElementById("areas_comunes").scrollIntoView({block: "center", behavior: "smooth"});
        });

        var navScroll = document.getElementById("nav-ambientes").addEventListener('click', function(e) {
            var cabanas = document.getElementById("ambiente").scrollIntoView({block: "center", behavior: "smooth"});
        });

        var navScroll = document.getElementById("nav-contacto").addEventListener('click', function(e) {
            var cabanas = document.getElementById("contacto").scrollIntoView({block: "center", behavior: "smooth"});
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
<body>
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
                    <a id="nav-cabana" class="text-light nav-link">Cabañas</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a id="nav-comunes" class="text-light nav-link">Espacios</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a id="nav-ambientes" class="text-light nav-link">Ambientes</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a id="nav-contacto" class="text-light nav-link">Contacto</a>
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
<div class="container-fluid">
  <div id="cabanasId" class="p-5 cabanas row row-no-padding h-100 d-flex justify-content-center">
    <div class="nuestras-cabanas col-12 text-center">
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
      <img class="no-padding img-cabana" src="images/cabana<?php echo $cabana['id'];?>.jpg" alt="">
      <div class="cabana">
        <h1 class="nombre-cabana text-light"><?php echo utf8_encode($cabana['nombre']); ?></h1>
        <p class="text-light">(<?php echo $cabana['numPersonas']?>-<?php echo $cabana['numPersonas']?> Personas)</p>
      </div>
      <div class="divinfo cabana">
        <a class="btn btninfo text-light" href="detail_pages/cabana/detail_cabana.php?cabana=<?php echo $cabana['id'];?>">+Info</a>
      </div>
    </div>
    <?php } ?>
  </div>
  <!--AREAS COMUNES-->
  <div id="areas_comunes" class="areas-comunes row justify-content-center contacto p-4">
  <div class="col-12"> <h1 class="text-center pb-4 title">ESPACIOS COMUNES</h1></div>
      <div class="col-md-3">
        <div class="row justify-content-center align-items-center">
          <div class="col text-center">
            <img class="img-comunes pt-4" src="icon/pool.png" alt="">
            <p class="p-4">Pase un rato refrescante en nuestras piscinas con tobogán.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="row justify-content-center align-items-center">
          <div class="col text-center">
            <img class="img-comunes pt-4" src="icon/jacuzzi.png" alt="">
            <p class="p-4">Relájese en nuestra tinaja de hidromasaje. Podrá reservarla por $25.000 la hora y media.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="row justify-content-center align-items-center">
          <div class="col text-center">
            <img class="img-comunes pt-4" src="icon/shop.png" alt="">
            <p class="p-4">En nuestro local de comida ofrecemos todos los dias servicios de comida rápida y provisiones.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="row justify-content-center align-items-center">
          <div class="col text-center">
            <img class="img-comunes pt-4" src="icon/slide.png" alt="">
            <p class="p-4">Juegos infantiles a libre disposición para los más pequeños de la familia.</p>
          </div>
        </div>
      </div>
      </div>
  </div>
  <!--FIN COMUNES-->
    <!--AMBIENTES-->
    <div id="ambiente" class="p-4 row d-flex justify-content-center">
    <div class="col-12"> <h1 class="text-center pb-4 title">AMBIENTES</h1></div>
    <div class="no-padding-ambiente col-md-3">
      <a href="#image1" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente1.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image1">
        <img class="long-animate" src="images/ambiente1.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image5" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente5.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image5">
        <img class="long-animate" src="images/ambiente5.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image3" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente3.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image3">
        <img class="long-animate" src="images/ambiente3.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image4" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente4.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image4">
        <img class="long-animate" src="images/ambiente4.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image2" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente2.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image2">
        <img class="long-animate" src="images/ambiente2.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image6" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente6.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image6">
        <img class="long-animate" src="images/ambiente6.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image7" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente7.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image7">
        <img class="long-animate" src="images/ambiente7.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image8" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente8.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image8">
        <img class="long-animate" src="images/ambiente8.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image9" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente9.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image9">
        <img class="long-animate" src="images/ambiente9.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image10" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente10.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image10">
        <img class="long-animate" src="images/ambiente10.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image11" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente11.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image11">
        <img class="long-animate" src="images/ambiente11.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image12" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente12.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image12">
        <img class="long-animate" src="images/ambiente12.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image13" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente13.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image13">
        <img class="long-animate" src="images/ambiente13.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
    <div class="no-padding-ambiente col-md-2">
      <a href="#image14" class="wiggle"><figure><img class="no-padding-ambiente ambiente" src="images/ambiente14.jpg"/></figure></a>
      <div class="lightbox short-animate" id="image14">
        <img class="long-animate" src="images/ambiente14.jpg"/>
      </div>
      <div id="lightbox-controls" class="short-animate">
        <a id="close-lightbox" class="long-animate" href="#!">Cerrar Lightbox</a>
      </div>
    </div>
  </div>

  <!--FIN AMBIENTES-->
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
  <div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.2433661440728!2d-71.73864888470978!3d-36.812687779946025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDQ4JzQ1LjciUyA3McKwNDQnMTEuMyJX!5e0!3m2!1ses!2scl!4v1612214082983!5m2!1ses!2scl" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
</div>

<footer>   
  <div class="container-footer-all">
        <div class="container-body">
          <div class="colum1">
               <h1>Más información de la compañia</h1>

               <p>Somos un complejo turistico de 5 cabañas , 3 piscinas , tinaja con hidromasajes y juegos infantiles. 
                 Inmersa en un hermoso bosque nativo, el cual tiene como objetivo  ofrecer a su familia  un espacio de 
                 descanso, relajo y esparcimiento en estrecha armonía con la naturaleza.</p>
          </div>

          <div class="colum2">

              <h1>Redes Sociales</h1>

              <div class="fila">
                  <img src="icon/facebook.png">
                  <label>Siguenos en Facebook</label>
              </div>
              <div class="fila">
                  <img src="icon/twitter.png">
                  <label>Siguenos en Twitter</label>
              </div>
              <div class="fila">
                  <img src="icon/instagram.png">
                  <label>Siguenos en Instagram</label>
              </div>
              <div class="fila">
                  <img src="icon/google-plus.png">
                  <label>Siguenos en Google Plus</label>
              </div>
              <div class="fila">
                  <img src="icon/pinterest.png">
                  <label>Siguenos en Pinterest</label>
              </div>
          </div>

          <div class="colum3">

              <h1>Información Contactos</h1>

              <div class="fila2">
                  <img src="icon/house.png">
                  <label>km 41,3 camino a Termas de Chillán  - Pinto.
Provincia de Ñuble</label>
              </div>

              <div class="fila2">
                  <img src="icon/smartphone.png">
                  <label>+56985233252</label>
              </div>

              <div class="fila2">
                  <img src="icon/contact.png">
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