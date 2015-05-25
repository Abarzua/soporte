<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "1q2w3e4r5t")
        or die("No se pudo realizar la conexion");
    mysql_select_db("inventario",$conex)
        or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}
$id_usuario = $_SESSION['id_user'];

$consulta= "SELECT * FROM usuarios WHERE id_user='".$id_usuario."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$apellidos = $fila['apellidos'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion Activos | SAESA</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">QUIENES SOMOS?</a>
                    </li>
                    <li>
                        <a href="services.php">SERVICIOS</a>
                    </li>
                    <li>
                        <a href="contact.php">CONTACTO</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">INVENTARIO <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="equipos.php"><span class="glyphicon glyphicon-blackboard" ></span> Notebook - PC's</a>
                            </li>
                            <li>
                                <a href="impresoras.php"><span class="glyphicon glyphicon-print" ></span> Impresoras RICOH</a>
                            </li>
                            <li>
                                <a href="proyectores.php"><span class="glyphicon glyphicon-film" ></span> Data Show</a>
                            </li>
                            <li>
                                <a href="captores.php"><span class="glyphicon glyphicon-phone" ></span> Captores de Datos</a>
                            </li>
                            <li>
                                <a href="reportes.php"><span class="glyphicon glyphicon-duplicate" ></span> Reportes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">USUARIOS <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.php">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.php">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.php">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="mayuscula"><strong><? echo $_SESSION['nombres'];?></strong></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="404.php"><span class="glyphicon glyphicon-cog" ></span> Configuración</a>
                            </li>
                            <li>
                                <a href="perfil.php"><span class="glyphicon glyphicon-user" ></span> Editar Perfil</a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#myModal"> About</a> 
                            </li>
                            <hr>
                            <li>
                                <a onclick="javascript: if(!confirm('¿De verdad quieres finalizar tu sesi&oacute;n?\n\nsi es as&iacute;, presiona ACEPTAR si no,\nentonces  presiona el bot&oacute;n CANCELAR')) return false"[<a href='desconectar_usuario.php']";">
                                <span class="glyphicon glyphicon-off" > 
                                Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Ventana Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <center><h2 class="modal-title" id="myModalLabel">Plataforma Administración de Activos</h2></center>
                </div>
                <div class="modal-body">
                    <center><h3>Soporte Informático Grupo Saesa</h3></center>
                    <hr>
                    <center>
                    <div>
                        <from class="from">
                            <p>Plataforma de Inventario</p>
                            <p>Desarrollado por el Área Soporte Informático</p>
                            <p>Grupo SAESA 2015</p>
                            <p>Todos los derechos Reservados</p>
                        </from>
                    </div>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Fin de la ventana Modal de About -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->

        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" ><center><img width=900 HEIGHT=300 src="img/soporte.PNG"></center></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill"><center><img width=900 HEIGHT=200 src="img/office365.PNG"></center></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill"><center><img width=900 HEIGHT=250 src="img/soporte2.JPG"></center></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <div class=""><center><img width=900 HEIGHT=250 src="img/soporte3.jpg" class="responsive"></center></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
           
            <div class="item">
                <div class=""><center><img width=900 HEIGHT=250 src="img/organigrama2015.png" class="responsive"></center></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bienvenidos a la Plataforma de Administración de Activos
                    <h4>
                    Soporte Informático | Grupo de Empresas SAESA.
                </h4>
                </h1>
                
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-blackboard"></i> PC's - Notebook - Perifericos</h4>
                    </div>
                    <div class="panel-body">
                        <p>Podra Administrar los activos como; PC's de la compañia, Notebook, perifericos relacionados como Monitotres, TV, Data Show, etc...</p>
                        <a href="equipos.php" class="btn btn-default">Leer mas...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-print"></i> Impresoras RICOH</h4>
                    </div>
                    <div class="panel-body">
                        <p>Configure y ordene su ZONA con la aplicacion de administración de Impresoras, en donde podra registrar; lugar, dirección, si su impresora es con IP/USB, a que delegación pertenece, etc...</p>
                        <a href="impresoras.php" class="btn btn-default">Leer mas...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-phone"></i> Captores de Datos</h4>
                    </div>
                    <div class="panel-body">
                        <p>Administre la totalidad de sus CAPTORES de Datos, los cambios que se producen, los que se envian a servicio técnico, y podra obtener reportes con mayor rapidez y eficiencia.</p>
                        <a href="captores.php" class="btn btn-default">Leer mas...</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Imagenes</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.php">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Administración de Activos.</h2>
            </div>
            <div class="col-md-6">
                <p>Con la Administración de Activos, Ud. podra controlar:</p>
                <ul>
                    <li><strong>INVENTARIO ACTIVOS</strong>
                    </li>
                    <li>NOTEBOOK's</li>
                    <li>DESKTOP</li>
                    <li>PERIFERICOS DE SALIDA</li>
                    <li>IMPRESORAS</li>
                    <li>CAPTORES DE DATOS (Honeywell 99EX)</li>
                    <li>REPORTES OBTIMIZADOS</li>
                </ul>
                <p>Controlar los Activos de su Compañia, no solo le ayudara a ordenar la arquitectura de su Empresa, ademas le otorgara una mejor gestión en los procesos de cambios de equipos, y ayudara a la reducción de costos.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Administración de Activos 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
