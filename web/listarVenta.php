<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include_once './PaginaVentas.php';
        $conexion = new mysqli("localhost", "root", "", "servidoycomido");
        ?>
        <script>
            $(document).ready(function (event) {
                $("#btnListarV").click(function () {
                    $("#txtVent").val("Listar");
                    $.ajax({
                        type: 'POST',
                        url: "ventaslistarPDF.php",
                        data: $("#fvente").serialize(),
                        success: function (data) {
                            $("#res").html(data);
                        }
                    });
                });
            });
        </script>
        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <form id="fvente">
                            <table>
                                <tr>
                                    <td>Fecha Inicio</td>
                                    <td>
                                        <input type="date" name="FechaIni" step="1" min="2013-01-01" max="2020-12-31" value="<?php echo date("Y-m-d")?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fecha Termino</td>
                                    <td>
                                        <input type="date" name="FechaTer" step="1" min="2013-01-01" max="2020-12-31" value="<?php echo date("Y-m-d")?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="button" value="Listar" id="btnListarV"/>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" id="txtVent" name="txtVent">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div id="res">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
