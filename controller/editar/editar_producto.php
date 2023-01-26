<?php
if (empty($_POST['edit_product_id'])) {
    $errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_product_id'])) {
    require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $product_name = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_edit"], ENT_QUOTES)));
    $product_referencia = mysqli_real_escape_string($con, (strip_tags($_POST["reference_edit"], ENT_QUOTES)));
    $product_price = mysqli_real_escape_string($con, (strip_tags($_POST["price_edit"], ENT_QUOTES)));
    $product_peso = mysqli_real_escape_string($con, (strip_tags($_POST["peso_edit"], ENT_QUOTES)));
    $product_categoria = mysqli_real_escape_string($con, (strip_tags($_POST["category_edit"], ENT_QUOTES)));
    $product_stock = mysqli_real_escape_string($con, (strip_tags($_POST["stock_edit"], ENT_QUOTES)));

    $product_id = intval($_POST['edit_product_id']);
    // UPDATE data into database
    $sql = "UPDATE product SET product_name='" . $product_name . "', product_referencia='" . $product_referencia . "', product_price='" . $product_price . "', product_peso='" . $product_peso . "',  product_categoria='" . $product_categoria . "',product_stock='" . $product_stock . "' WHERE product_id='" . $product_id . "' ";
    $query = mysqli_query($con, $sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
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