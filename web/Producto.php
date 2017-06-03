<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include_once './PaginaAdministrador.php';
        ?>
        <div class="row" style="margin: 30px 100px ">
            <div class="panel">
                <form method="post" action="subirProducto.php" enctype="multipart/form-data">
                    <table class="table tab-pane" style="background-color: #b2dba1">
                        <tr>
                            <td colspan="2" class="text-center"><font size="5"> Formulario Cargar de Productos</font></td>
                        </tr>
                        <tr>
                            <td>Nombre :</td>
                            <td>
                                <input type="text"
                                       required name="txtNombreP">
                            </td>
                        </tr>
                        <tr>
                            <td>Descripcion:</td>
                            <td>
                                <textarea name="txtDesc" rows="4" cols="25">
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Precio:</td>
                            <td>
                                <input type="number" required
                                       name="txtPrecio">
                            </td>
                        </tr>

                        <tr>
                            <td>Imagen :</td>
                            <td>
                                <input type="file" required 
                                       accept=".jpg, .gif, .jpeg"
                                       name="filFoto">
                                <input type="submit" value="Grabar">
                            </td>
                        </tr>

                    </table>                
                </form>
                <div style="background-color: #b2dba1">
                    <?php include_once './ProductoVista.php'; ?>
                </div>
            </div>
    </body>
</html>
