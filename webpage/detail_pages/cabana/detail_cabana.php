<?php 
$dirname = dirname(__DIR__, 2);
include_once(__DIR__."/../../views/reserva_cabana.view.php");
include_once("$dirname/controllers/cabanas.controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="cabañas en chillan"/>
    <meta name="keywords" content="cabañas en chillan, cabañas camino a termas de chillan, termas de chillan"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="../../fullcalendar-5.5.1/lib/main.css" rel="stylesheet">
    <script src="../../fullcalendar-5.5.1/lib/main.js"></script>
    <title>Document</title>
</head>
<script>
        document.addEventListener("DOMContentLoaded", e => {
            var calendarEl = document.getElementById('calendar');
            var data =  <?php echo json_encode($reservas);?>;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                locale: 'es',
                editable : true,
                height: 650,
                buttonText: {
                    today: 'Hoy'
                }
            });
            calendar.render();
            calendar.addEventSource(data);
            calendar.refetchEvents()
        });
</script>
<body class="bg-light">
    <nav id="nav" class="navbar fixed-top pt-1 navbar-expand-lg navbar-dark">
        <a href="../../index.php" class="ml-4 logo navbar-brand text-white">cabañas colibrí</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="mr-5 nav-item w-100">
                    <a href="../../index.php" class="text-light nav-link">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="../../index.php#cabanasId" class="text-light nav-link">Cabañas</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="#" class="text-light nav-link">Ubicación</a>
                </li>
                <li class="mr-5 nav-item w-100">
                    <a href="../../index.php#contacto" class="text-light nav-link">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="super_container">
        <header class="header" style="display: none;">
            <div class="header_main">
                <div class="container mt-500">
                    <div class="row">
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="single_product bg-light">
            <?php ?>
            <div class="container-fluid" style=" padding: 11px;">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                $dirname = dirname(__DIR__, 1);
                                $path = $dirname.'/images/cabana'.$_GET['cabana'];
                                $dh = opendir($path);
                                while(($file = readdir($dh)) !== false) {
                                    if($file == '.' || $file == '..') {
                                        continue;
                                    } else {
                                        $images[] = $file;
                                    }
                                }

                                closedir($dh);
                                $cont = 0;
                                foreach($images as $image) { $cont++;?>
                                
                              <div class="carousel-item <?php if($cont == 1) echo 'active' ?>">
                                <img class="d-block w-100" src="../images/cabana<?php echo $_GET['cabana']?>/<?php echo $image?>" alt="First slide">
                              </div>
                            <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                    <div class="col-lg-3 order-3">
                        <div class="product_description">
                            <div class="product_name">Cabaña <?php echo utf8_encode($cabana[0]["nombre"]);?></div>
                            <!-- <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div> -->
                            <!-- <div class="bg-dark"> <span class="product_price">Tarifas</span></div>   -->                          
                            <hr class="singleline p-2">
                            <div class=""> 
                                <div class="icons d-flex justify-content-around">
                                    <img class="television" src="../../icon/television.png" alt="television">
                                    <img class="microwave" src="../../icon/microwave.png" alt="microondas">
                                    <img class="microwave" src="../../icon/kitchen.png" alt="cocina">
                                    <img class="microwave" src="../../icon/fridge.png" alt="cocina">
                                    <img class="microwave" src="../../icon/no-animals.png" alt="cocina">
                                </div>
                                <div class="features p-2 pt-4">
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Cabaña para <?php echo $cabana[0]["numPersonas"];?> personas</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline"><?php echo $cabana[0]["numHabitaciones"];?> Dormitorios</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline"><?php echo $cabana[0]["numBaños"];?><?php if($cabana[0]["numBaños"] > 1){ echo " Baños"; } else { echo " Baño";}?></p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">TV Cable</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Vajillas</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Loza</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Encimeras</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Microondas</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Refrigerador</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Ropa de cama</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">Agua caliente</p></div>
                                    <div><i class="fas fa-check"></i><p class="pl-2 d-inline">No se admiten mascotas</p></div>
                                </div>
                            </div>
                            <div>
                            </div>
                            <hr class="singleline">
                            <div class="row pt-3 pb-4">
                                <div class="col-md-6 mt-2"><a class="modal-trigger" href="#modal"><button type="button" class="w-100 btn shop-button">VER TARIFAS</button></a>
                                </div>
                                <div class="col-md-6 mt-2"><a href="https://wa.me/+56985233252/" target="_blank"><button type="button" class="w-100 btn shop-button">Reservar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-underline">
                    <div class="col-md-6"> <h1 class=" deal-text">Disponibilidad</h1> </div>
                    <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="modal">
    <div class="modal__dialog">
        <section class="modal__content">
        <header class="modal__header">
            <h3 class="modal__title">Tarifas</h3>
            <a href="#" class="modal__close">&#10006;</a>
        </header>
        <div class="modal__body">
            <p class="modal__text">
                <div class="col-12">
                    <?php echo $cabana[0]["descripcion"];?>
                </div>
            </p>
        </div>
        <footer class="modal__footer">
           
        </footer>
        </section>
    </div>
    </div>
    <footer>   
    <div class="container-footer-all">
            <div class="container-body">
            <div class="colum1">
                <h1>Maá información de la compañia</h1>

                <p>Esta compañia se dedica a la venta de software integrado con un 
                conjunto de cosas que no se lo que estoy escribiendo, este 
                texto es solo para llenara informacion en el cuadro de informacion 
                de la compañia.</p>
            </div>

            <div class="colum2">

                <h1>Redes Sociales</h1>

                <div class="fila">
                    <img src="../../icon/facebook.png">
                    <label>Siguenos en Facebook</label>
                </div>
                <div class="fila">
                    <img src="../../icon/twitter.png">
                    <label>Siguenos en Twitter</label>
                </div>
                <div class="fila">
                    <img src="../../icon/instagram.png">
                    <label>Siguenos en Instagram</label>
                </div>
                <div class="fila">
                    <img src="../../icon/google-plus.png">
                    <label>Siguenos en Google Plus</label>
                </div>
                <div class="fila">
                    <img src="../../icon/pinterest.png">
                    <label>Siguenos en Pinterest</label>
                </div>
            </div>

            <div class="colum3">

                <h1>Información Contactos</h1>

                <div class="fila2">
                    <img src="../../icon/house.png">
                    <label>km 41,3 camino a Termas de Chillán  - Pinto.
Provincia de Ñuble</label>
                </div>

                <div class="fila2">
                    <img src="../../icon/smartphone.png">
                    <label>+56985233252</label>
                </div>

                <div class="fila2">
                    <img src="../../icon/contact.png">
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