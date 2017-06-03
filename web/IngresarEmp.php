
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar empleado</title>
    </head>
    <body>

        <?php include_once './PaginaContador.php'; ?>

        <?php
        $conexion = new mysqli("localhost", "root", "", "servidoycomido");
        ?>


        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <form method="post" action="GuardarEmpleado.php" enctype="multipart/form-data">
                            <table class="table tab-pane table-bordered">
                                <tr>
                                    <td colspan="2" class="text-center"><font size="5"> Ingreso de personal</fon></td>
                                </tr>

                                <tr>
                                    <td>Rut :</td>
                                    <td> <input onkeyup="this.value = this.value.toUpperCase();" type="text" name="txtRut" id="txtRut" value=""> </td>
                                </tr>
                                <tr>
                                    <td>Nombre :</td>
                                    <td> <input onkeyup="this.value = this.value.toUpperCase();" type="text" name="txtNombre" id="txtNombre" value=""> </td>
                                </tr>
                                <tr>
                                    <td>Apellido Paterno :</td>
                                    <td><input type="text" name="txtApp" id="txtApp" value="" onkeyup="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                    <td>Apellido Materno :</td>
                                    <td><input type="text" name="txtApm" id="txtApm" value=""onkeyup="this.value = this.value.toUpperCase();" ></td>
                                </tr>
                                <tr>
                                    <td>Edad :</td>
                                    <td><input type="number" name="txtEdad" id="txtEdad" value=""></td>
                                </tr>
                                <tr>
                                    <td>Sueldo :</td>
                                    <td><input type="number" name="txtSueldo" id="txtSueldo" value=""></td>
                                </tr>
                                <tr>
                                    <td>Curriculum :</td>
                                    <td><input type="file" required 
                                               accept=".doc, .docx, .pdf"
                                               name="filDoc"
                                               >

                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td>
                                        <select name="cboCargo">
                                            <?php
                                            $sql = $conexion->query("select * from cargo;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <td>AFP</td>
                                    <td>
                                        <select name="cboAfp">
                                            <?php
                                            $sql = $conexion->query("select * from afp;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <input type="submit" value="Grabar"> </td>

                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
