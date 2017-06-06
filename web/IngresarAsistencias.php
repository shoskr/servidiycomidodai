
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <script language="JavaScript" type="text/javascript">
            function show5() {
                if (!document.layers && !document.all && !document.getElementById)
                    return

                var Digital = new Date()
                var hours = Digital.getHours()
                var minutes = Digital.getMinutes()
                var seconds = Digital.getSeconds()

                var dn = "PM"
                if (hours < 12)
                    dn = "AM"
                if (hours > 12)
                    hours = hours - 12
                if (hours == 0)
                    hours = 12

                if (minutes <= 9)
                    minutes = "0" + minutes
                if (seconds <= 9)
                    seconds = "0" + seconds
                //change font size here to your desire
                myclock = "<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>" + hours + ":" + minutes + ":"
                        + seconds + " " + dn + "</b></font>"
                if (document.layers) {
                    document.layers.liveclock.document.write(myclock)
                    document.layers.liveclock.document.close()
                } else if (document.all)
                    liveclock.innerHTML = myclock
                else if (document.getElementById)
                    document.getElementById("liveclock").innerHTML = myclock
                setTimeout("show5()", 1000)
            }


            window.onload = show5
            //-->
        </script>

        <?php include_once './PaginaAdministrador.php'; ?>
        <?php $conexion = new mysqli("localhost", "root", "", "servidoycomido"); ?>


        <script>
            $(document).ready(function (event) {
                $("#btnEntrada").click(function () {
                    $("#txtRegistro").val("ENTRADA");
                    $.ajax({
                        type: 'POST',
                        url: "GuardarAsistencia.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    });
                });
                $("#btnSalida").click(function () {
                    $("#txtRegistro").val("SALIDA");
                    $.ajax({
                        type: 'POST',
                        url: "GuardarAsistencia.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }

                    });
                });
            });
        </script>




        <div class=" row">
            <div class="col-md-offset-1 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <form id="formu">
                            <table class="table text-center">
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <select name="cboEmp">
                                            <?php
                                            $sql = $conexion->query("select * from empleado order by nombre;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                if ($row[8] == 1) {
                                                    ?>
                                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>    
                                        </select>
                                    </td> 

                                </tr>
                                <span id="liveclock" style="position:absolute;left:800;top:10;color: black " ></span>

                                <tr>

                                    <td>
                                        <input type="button" value="ENTRADA"id="btnEntrada">
                                    </td>

                                    <td>
                                        <input type="button" value="SALIDA" id="btnSalida" >
                                    </td>
                                </tr>

                            </table>

                            <input type="hidden" name="txtRegistro" id="txtRegistro">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div id="respuesta">

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
