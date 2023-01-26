<?php
require_once("../../config/conexion.php");

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

    $tables = "product";
    $campos = "*";
    $sWhere = "product.product_name LIKE '%" . $query . "%'";
    $sWhere .= "Order by product.product_name";
}


include 'pagination.php'; //include pagination file
//pagination variables
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
$per_page = intval($_REQUEST['per_page']); //how much records you want to show
$adjacents  = 4; //gap between pages after number of adjacents
$offset = ($page - 1) * $per_page;
//Count the total number of row in your table*/
$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere ");
if ($row = mysqli_fetch_array($count_query)) {
    $numrows = $row['numrows'];
} else {
    echo mysqli_error($con);
}
$total_pages = ceil($numrows / $per_page);
//main query to fetch the data
$query = mysqli_query($con, "SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
//loop through fetched data





if ($numrows > 0) {

?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class='text-center'>Producto</th>
                    <th>Código </th>
                    <th>Categoría </th>
                    <th class='text-center'>Stock</th>
                    <th class='text-right'>Precio</th>
                    <th class='text-right'>Fecha de Creación</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_referencia = $row['product_referencia'];
                    $product_price = $row['product_price'];
                    $product_peso = $row['product_peso'];
                    $product_categoria = $row['product_categoria'];
                    $product_stock = $row['product_stock'];
                    $product_fech_crea = $row['product_fech_crea'];
                    $finales++;
                ?>
                    <tr class="<?php echo $text_class; ?>">
                        <td class='text-center'><?php echo $product_name; ?></td>
                        <td><?php echo $product_referencia; ?></td>
                        <td><?php echo $product_categoria; ?></td>
                        <td class='text-center'><?php echo $product_stock; ?></td>
                        <td class='text-right'><?php echo number_format($product_price, 2); ?></td>
                        <td class='text-right'><?php echo $product_fech_crea; ?></td>
                        <td>
                            <a href="#" data-target="#editProductModal" class="edit" data-toggle="modal" data-name='<?php echo $product_name ?>' data-reference="<?php echo $product_referencia; ?>" data-category="<?php echo $product_categoria ?>" data-stock="<?php echo $product_stock; ?>" data-price="<?php echo $product_price; ?>" data-peso="<?php echo $product_peso; ?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan='6'>
                        <?php
                        $inicios = $offset + 1;
                        $finales += $inicios - 1;
                        echo "Mostrando $inicios al $finales de $numrows registros";
                        echo paginate($page, $total_pages, $adjacents);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



<?php
}

?>