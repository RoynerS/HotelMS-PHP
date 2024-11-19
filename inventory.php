<!-- inventory.php -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Inventario</li>
        </ol>
    </div><!--/.row-->
    <!-- Modal para editar cantidad -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Artículo al Inventario</div>
                <div class="panel-body">
                    <form id="addInventoryItem" method="POST" action="ajax.php">
                        <div class="form-group">
                            <label>Nombre del Artículo</label>
                            <input type="text" class="form-control" name="item_name" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Artículo</label>
                            <select class="form-control" name="item_type" required>
                                <option value="apero">Aperitivo</option>
                                <option value="bebida">Bebida</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-success">Agregar Artículo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Artículos en Inventario</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre del Artículo</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './db.php'; // Asegúrate de incluir la conexión a la base de datos
                            $inventory_query = "SELECT * FROM inventory";
                            $inventory_result = mysqli_query($connection, $inventory_query);
                            while ($item = mysqli_fetch_assoc($inventory_result)) {
                                ?>
                                <tr>
                                    <td><?php echo $item['item_name']; ?></td>
                                    <td><?php echo $item['item_type']; ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td>
                                        <button class="btn btn-info"
                                            onclick='openEditModal(<?php echo json_encode($item); ?>)'>Editar</button>
                                        <button class="btn btn-danger"
                                            onclick="deleteItem(<?php echo $item['id']; ?>)">Eliminar</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Modal para Editar Artículo -->
                    <div id="editItemModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Artículo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateInventoryItem" method="POST" action="ajax.php">
                                        <input type="hidden" name="item_id" id="item_id" value="">
                                        <!-- Campo oculto para ID -->
                                        <div class="form-group">
                                            <label>Nombre del Artículo</label>
                                            <input type="text" class="form-control" name="item_name" id="item_name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo de Artículo</label>
                                            <select class="form-control" name="item_type" id="item_type" required>
                                                <option value="apero">Aperitivo</option>
                                                <option value="bebida">Bebida</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" class="form-control" name="price" id="price" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Actualizar Artículo</button>
                                    </form>
                                    <form id="addInventoryItem" method="POST" action="ajax.php">
                                        <div class="form-group">
                                            <label>Nombre del Artículo</label>
                                            <input type="text" class="form-control" name="item_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo de Artículo</label>
                                            <select class="form-control" name="item_type" required>
                                                <option value="apero">Aperitivo</option>
                                                <option value="bebida">Bebida</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control" name="quantity" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" class="form-control" name="price" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Agregar Artículo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>