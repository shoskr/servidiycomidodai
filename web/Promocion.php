
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include_once './PaginaAdministrador.php'; ?>
        <div class="section-slogan hidden-xs">
            <div class="row" style="margin: 250px 100px 0px 150px ;background-color: ">
                <div class="panel" style="background-color: #000 ;margin: 20px"  >
                    <form method="post" action="SubirPromocion.php" enctype="multipart/form-data" style="margin: 10px 350px">
                        <table border="1" style="background-color: #b2dba1">
                            <tr>
                                <td colspan="2">Formulario Cargar de Productos</td>
                            </tr>
                            <tr>
                                <td>Nombre :</td>
                                <td>
                                    <input type="text"
                                           required name="txtNombrePr">
                                </td>
                            </tr>
                            <tr>
                                <td>Descripcion:</td>
                                <td>
                                    <input type="text"
                                           required name="txtDesc">
                                </td>
                            </tr>
                            <tr>

                                <td>Fecha Inicio:</td>
                                <td>
                                    <input type="date" id="fecha" name="fecha" >


                                </td>
                            </tr>
                            <tr>

                                <td>Fecha Termino:</td>
                                <td>
                                    <input type="date" id="fecha" name="fecha" >


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
                    <?php
                    include_once './PromocionVista.php';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
