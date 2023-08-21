<?php 
include("admin/db/db-connection.php");

//Seleccionar registros de portafolio
$sentencia=$conexion->prepare("SELECT * FROM `portafolio`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de entradas
$sentencia=$conexion->prepare("SELECT * FROM `entradas`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_entrada = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de entradas
$sentencia=$conexion->prepare("SELECT * FROM `configuraciones`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_config = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM `servicios`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $lista_config[0]['descripcion']?></title>
        <!-- Favicon-->
        <link width="5px" rel="icon" type="image/x-icon" href="assets/imgFunzoo/config/<?php echo $lista_config[1]['imagen']?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fontawesome.com/icons">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">

               <img  height="80" width="80" src="assets/imgFunzoo/config/<?php echo $lista_config[1]['imagen']?>" class="rounded-top "   alt=""> <a class="navbar-brand" href="#page-top"><?php echo $lista_config[1]['descripcion']?></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Nosotros</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#services">Servicios</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contacto</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="admin/login.php">Admin log in</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img  src="assets/imgFunzoo/config/<?php echo $lista_config[2]['imagen']?>" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0"><?php echo $lista_config[3]['descripcion']?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0"><?php echo $lista_config[4]['descripcion']?></p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container1">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portafolio</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
                 <div class="row" style="width:100%; margin-left:0px; justify-content: center;">
                 <?php foreach($lista_portafolio as $portafolio){?>
                    <div class="col-lg-2 col-sm-6 mb-5" style="display: flex; justify-content: center;">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $portafolio['id']?>">
                                <div class="portfolio-hover">
                                    <style>
                                        .portfolio-hover-content{
                                            display: flex;
                                            justify-content: center;
                                            position: absolute;
                                            margin: 100px;
                                            padding: 100px;
                                            left: 70px;
                                            visibility: hidden;
                                        }
                                    </style>
                                    <div class="portfolio-hover-content" ><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" style="width:100%;height: 100%;"src="assets/imgFunzoo/<?php echo $portafolio['imagen']?>" alt="..." />
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $portafolio['id']?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $portafolio['id']?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?php echo $portafolio['titulo']?></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/imgFunzoo/<?php echo $portafolio['imagen']?>" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4" style="text-align:justify;"><?php echo $portafolio['descripcion']?></p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Cerrar ventana
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <?php }?>
                 </div>

        </section>
                    <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
       
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">MISIÓN y VISIÓN</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead" style="text-align:justify;"><?php echo $lista_config[5]['descripcion']?></p></div>
                    <div class="col-lg-4 me-auto"><p class="lead" style="text-align:justify;"><?php echo $lista_config[6]['descripcion']?></p></div>
                </div>
                <h2 class="page-section-heading text-center text-uppercase text-white">OBJETIVO</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead" style="text-align:justify;"><?php echo $lista_config[7]['descripcion']?></p></div>
                    <div class="col-lg-4 me-auto"><img class="img-fluid rounded mb-5" src="assets/imgFunzoo/config/<?php echo $lista_config[7]['imagen']?>" alt="..." style="margin-top:20px; "/></div>
                </div>
                <h2 class="page-section-heading text-center text-uppercase text-white"><img class="img-fluid rounded mb-5" src="assets/imgFunzoo/config/<?php echo $lista_config[8]['imagen']?>" alt="..." style="margin-top:20px; "/></h2>
                <!-- About Section Button-->
            
            </div>
        </section>
        <!-- Servicios -->
        <section class="page-section" id="services">
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center" style="justify-content:center;">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">SERVICIOS</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            
        <?php foreach($lista_servicios as $servicios){?>
                    <!-- se añade un echo para mostrar la imagen y la seccion que se desea integrar-->
                    <div class="col-md-3 row justify-content-center">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary "></i>
                            <i class="fas <?php echo $servicios['icono'];?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="text-center my-3"><?php echo $servicios['titulo'];?></h4>
                        <p class="text-muted text-center"><?php echo $servicios['descripcion'];?></p>
                        <br><br><br><br>
                    </div>
            <?php }?>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Entre otros servicios</h2>
            <br><br><br>
            <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead" style="text-align:justify;"><?php echo $lista_config[9]['descripcion']?></p></div>
                    <div class="col-lg-4 me-auto"><img class="img-fluid rounded mb-5" src="assets/imgFunzoo/config/<?php echo $lista_config[9]['imagen']?>" alt="..." style="margin-top:20px; "/></div>
                </div>
        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">CONTACTANOS</h2>
              
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                 
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            2215 John Daniel Drive
                            <br />
                            Clark, MO 65243
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
        </div>

       
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
