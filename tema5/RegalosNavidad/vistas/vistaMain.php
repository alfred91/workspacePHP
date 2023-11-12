<?php
namespace RegalosNavidad\vistas;

class Vistamain
{

    public static function render()
    {
        include("cabeceraMain.php"); ?>

        <div class="container-fluid">
            SOY VISTA MAIN
        </div>

        <?php include("pieMain.php");
    }
} ?>