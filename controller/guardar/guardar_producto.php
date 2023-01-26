<?php
if (empty($_POST['nombre'])) {
	$errors[] = "Ingresa el nombre del producto.";
} elseif (!empty($_POST['nombre'])) {
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	date_default_timezone_set("America/Bogota");
	$product_name = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
	$product_referencia = mysqli_real_escape_string($con, (strip_tags($_POST["reference"], ENT_QUOTES)));
	$product_price = mysqli_real_escape_string($con, (strip_tags($_POST["price"], ENT_QUOTES)));
	$product_peso = mysqli_real_escape_string($con, (strip_tags($_POST["peso"], ENT_QUOTES)));
	$product_categoria = mysqli_real_escape_string($con, (strip_tags($_POST["category"], ENT_QUOTES)));
	$product_stock = mysqli_real_escape_string($con, (strip_tags($_POST["stock"], ENT_QUOTES)));
	$product_fech_crea = date('Y-m-d H:i:s');

	// REGISTER data into database
	$sql = "INSERT INTO product(product_id, product_name, product_referencia, product_price, product_peso, product_categoria,product_stock,product_fech_crea) VALUES (NULL,'$product_name','$product_referencia','$product_price','$product_peso','$product_categoria','$product_stock','$product_fech_crea')";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "El producto ha sido guardado con éxito.";
	} else {
		$errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
	}
} else {
	$errors[] = "desconocido.";
}
if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>