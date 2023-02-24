<?php
namespace dwesgram\controlador;

use dwesgram\modelo\UsuarioBd;

class BusquedaControlador extends Controlador
{
    //Para practicar hacemos el buscador
    public function buscar(): array
    {
        $this->vista = 'buscar/busqueda';

        if (!$_POST) {
            $this->vista = 'buscar/busqueda';
            return [];
        }
        $res =  UsuarioBd::buscarUsuarioPorNombre(trim($_POST['busqueda']));
        return $res;
    }
}

