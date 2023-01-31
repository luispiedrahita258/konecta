<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="edit_product" id="edit_product">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label>Nombre del Producto</label>
                        <input type="text" name="nombre_edit" id="nombre_edit" class="form-control" required>
                        <input type="text" name="edit_product_id" id="edit_product_id">
                    </div>
                    <div class="form-group">
                        <label>Referencia</label>
                        <input type="number" name="reference_edit" id="reference_edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="price_edit" id="price_edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Peso</label>
                        <input type="number" name="peso_edit" id="peso_edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <input type="text" name="category_edit" id="category_edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock_edit" id="stock_edit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-info" value="Guardar Datos">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>