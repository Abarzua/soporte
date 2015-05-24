<?php 
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "1q2w3e4r5t")
		or die("No se pudo realizar la conexion");
	mysql_select_db("inventario",$conex)
		or die("ERROR con la base de datos");

//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['password'];

//Consultar si los datos son están guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$contrasena."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);


if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password incorrectos, por favor verifique.")
	self.location = "http://localhost/soporte/index.html"
	</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['id_user'] = $fila['id_user'];
	$_SESSION['nombres'] = $fila['nombres'];

	header("Location: home.php");
}
?>