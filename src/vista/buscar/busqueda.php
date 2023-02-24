<?php
if (!$_SESSION) {
   echo "Debes estar logueado para acceder aqui";
   echo "<a href='index.php'> Pulsa aqui para volver al inicio</a></li>";
} else {
$usuarios = $datosParaVista['datos'];

echo "<div class='container'>";
if (count($usuarios) < 0 && !isset($_POST['busqueda'])) {
    echo <<<END
    <div class="alert alert-primary" role="alert">
        No hay usuarios
    </div>
    END;

    } else if(count($usuarios) == 0 && isset($_POST['busqueda'])) {
        echo "<div class='alert alert-primary' role='alert'>";
        echo "No hay usuarios con ese nombre";
        echo "</div>"; 
    }else {
        //Buscador de entradas
        echo "<h4>Buscar usuario</h4>";
        echo <<<END
        <form action="index.php?controlador=busqueda&accion=buscar" method="POST">
            <input type="text" id="busqueda" name="busqueda"/>
            <button type="submit">Buscar</button>
        </form>
        END;

    echo "<div class='row'>";
    if (isset($_POST['busqueda'])) {
        echo "<div>Usuarios encontrados con el patron ({$_POST['busqueda']})</div>";
    }
    foreach ($usuarios as $usuario) {
        echo "<div class='col-sm-3'>";
            echo "<div class='card'>";
            if ($usuario->getAvatar()) {
                echo "<img src='{$usuario->getAvatar()}' class='card-img-top' alt='Avatar del usuario'>";
            } else {
                echo "<img src='assets/img/bender.png' class='card-img-top' alt='Avatar del usuario'>";
                
            }
            echo <<<END
                    <div class="card-body">
                        <h5 class="card-title">{$usuario->getNombre()}</h5>
                    </div>
                </div>
            END;
        echo "</div>";
    }
    echo "</div>";
}
echo "</div>";

}