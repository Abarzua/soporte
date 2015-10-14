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

    <title>Quienes Somos | Administración de Activos</title>

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
        <script type="text/javascript" src="js/prototype.js"></script>
        <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />


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
                    <li class="active">
                        <a href="about.php">QUIENES SOMOS</a>
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
                                <a href="#"><span class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#ModalAbout"> About</a> 
                            </li>
                            <hr>
                            <li>
                                <a <a onclick="javascript: if(!confirm('¿De verdad quieres finalizar tu sesi&oacute;n?\n\nsi es as&iacute;, presiona ACEPTAR si no,\nentonces  presiona el bot&oacute;n CANCELAR')) return false"[<a href='desconectar_usuario.php']";">
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
    <div class="modal fade" id="ModalAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">    QUIENES SOMOS?
                    <small>Administración de Activos</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php">Home</a>
                    </li>
                    <li class="active">QUIENES SOMOS?</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="img/organigrama2015.png" alt="">

                        <!-- Botón de apertura -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                          <span class="glyphicon glyphicon-fullscreen" ></span>
                        </button>
                         
                        <!-- Ventana Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h3 class="modal-title" id="myModalLabel">Organigrama Área Soporte Informático 2015</h3></center>
                              </div>
                              <div class="modal-body">
                                <center><img class="img-responsive" src="img/organigrama2015.png"></center>
                              </div>
                              <div class="modal-footer">

                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

                              </div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-md-6">
                <h2>Soporte Informático Grupo SAESA 2015</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>
        <!-- /.row -->

<!-- Ventanas de las imagenes pequeñas -->

                 <!-- Ventana Modal JOSE ESPINOZA -->
                        <div class="modal fade" id="Jose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Jose">Jefe de Área Soporte Informático</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/jefe.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:jose.espinoza@saesa.cl">jose.espinoza@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA LUXO -->
                 <!-- Ventana Modal LUIS ABARZUA -->
                        <div class="modal fade" id="Luis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Luis">Soporte Informático Valdivia</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/luis.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:luis.abarzua@saesa.cl">luis.abarzua@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA LUIS -->
                 <!-- Ventana Modal MAGALY ALARCON -->
                        <div class="modal fade" id="Magy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Magy">Soporte Informático Osorno</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/magaly.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:magaly.alarcon@saesa.cl">magaly.alarcon@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA MAGALY -->
                 <!-- Ventana Modal SERGIO ALBARRACIN -->
                        <div class="modal fade" id="Sergio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Sergio">Soporte Informático Puerto Montt</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/sergio.JPG"></center>
                                <hr>
                                <center>Email: <a href="mailto:eduardo.baeza@saesa.cl">eduardo.baeza@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA SERGIO -->
                 <!-- Ventana Modal VICTOR CONTRERAS -->
                        <div class="modal fade" id="Victor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Victor">Soporte Informático Osorno</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/victor.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:victor.contreras@saesa.cl">victor.contreras@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA VICTOR -->

                 <!-- Ventana Modal BEATRIZ GUEICHA -->
                        <div class="modal fade" id="Beatriz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Beatriz">Soporte Informático Coyhaique </h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/beatriz.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:beatriz.gueicha@saesa.cl">beatriz.gueicha@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA BEATRIZ -->

<!-- Ventana Modal JAIME MALDONADO -->
                        <div class="modal fade" id="Jaime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Jaime">Soporte Informático Temuco</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/jaime.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:jaime.maldonado@saesa.cl">jaime.maldonado@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA JAIME -->
                                             
<!-- Ventana Modal RICARDO MALDONADO -->
                        <div class="modal fade" id="Ricardo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 class="modal-title" id="Ricardo">Soporte Informático Concepción</h2></center>
                              </div>
                              <div class="modal-body">
                                <center><img width="100%" height="200" src="img/ricardo.png"></center>
                                <hr>
                                <center>Email: <a href="mailto:ricardo.munoz@saesa.cl">ricardo.munoz@saesa.cl</a></center>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- FIN VENTANA RICARDO -->                                                                       

<!-- FIN DE LAS IMAGENES PEQUEÑAS -->
        <!-- Team Members -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Equipo de Trabajo</h2>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">

                     <img class="img-responsive" src="img/jefe.jpg" data-toggle="modal" data-target="#Jose">
                    </img>
                    <div class="caption">
                        <h3>José Manuel Espinoza<br>
                            <small>Jefe Área Soporte</small>
                        </h3>
                        
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="img/luis.png" data-toggle="modal" data-target="#Luis">
                    </img> 
                    <div class="caption">
                        <h3>Luis Abarzúa<br>
                            <small>Soporte Informático Valdivia</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/antonio.abarzua"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="img/magaly.png" data-toggle="modal" data-target="#Magy">
                    </img> 
                    <div class="caption">
                        <h3>Magaly Alarcón<br>
                            <small>Soporte Informático Osorno</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="img/sergio.jpg" data-toggle="modal" data-target="#Sergio">
                    </img> 
                    <div class="caption">
                        <h3>NN<br>
                            <small>Soporte Informático Pto. Montt</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="img/victor.png" data-toggle="modal" data-target="#Victor">
                    </img> 
                    <div class="caption">
                        <h3>Victor Contreras<br>
                            <small>Soporte Informático Osorno</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                   <img class="img-responsive" src="img/beatriz.png" data-toggle="modal" data-target="#Beatriz">
                    </img> 
                    <div class="caption">
                        <h3>Beatriz Gueicha<br>
                            <small>Soporte Informático Coyhaique</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-4"></div>
            <div class="col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-responsive" src="img/jaime.png" data-toggle="modal" data-target="#Jaime">
                    </img> 
                        <div class="caption">
                            <h3>Jaime Maldonado<br>
                                <small>Soporte Informático Temuco</small>
                            </h3>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-responsive" src="img/ricardo.png" data-toggle="modal" data-target="#Ricardo">
                    </img> 
                        <div class="caption">
                            <h3>Ricardo Muñoz<br>
                                <small>Soporte Informático Concepción</small>
                            </h3>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                               
            </div>
        
        <!-- /.row -->

        <!-- Our Customers -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Colaboradores</h2>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
