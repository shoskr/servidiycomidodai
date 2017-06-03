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
           <?php
        include_once './PaginaAdministrador.php';
        ?>
    </head>
    <body>
        <div class="section-slogan hidden-xs" style="margin: 29px 100px 0px 350px ;text-align: center" >
            <form method="post" action="AgregarNoticias.php" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <td colspan="2">Noticias</td>
                    </tr>
                    <tr>
                        <td>Titulo Noticia :</td>
                        <td>
                            <input type="text" required name="txtNombreN">
                        </td>
                    </tr>
                    <tr>
                        <td>Descripcion:</td>
                        <td>
                            <textarea name="txtDesc" rows="4" cols="15">
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha :</td>
                        <td>
                            <input type="date" name="Fecha" step="1" min="2013-01-01" max="2020-12-31" value="2017-05-18">
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
        </div>
        <div>  
            <?php
            include_once './NoticiaVista.php';
            ?>
        </div>
    </body>
</html>
