<?php
session_start();
session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <div>
            <?php
            include_once './index.php';
            ?>
        </div>
        <div>

            <div class="section-slogan hidden-xs" style="margin: 0px 100px 100px 0px ;text-align: center">
                <div class="row" >    
                    <div class="col-md-offset-5 col-md-4" style="background-color: #E0E0E0 ; "> 
                        <form method="post" action="loginform.php" >
                           
                                <table class="tab-pane table " style="text-align: left ">
                                    <tr>
                                        <td><font size='3' color="black"><b>Ingresar Usuario :  </b></font></td>
                                        <td><input type="text" valeu="" name="txtUsuario"required >  </td>
                                    </tr>
                                    <tr>
                                        <td> <font size='3' color="black"><b>Passeord :  </b></font></td>
                                        <td>  <input type="password" value="" name="txtPass"required  </td>
                                    </tr>
                                    <tr>
                                        <td> <input class="bottom btn-lg" style="background-color: #269abc" type="submit" value="Ingresar"> </td>
                                    </tr>
                                </table>
                            
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
