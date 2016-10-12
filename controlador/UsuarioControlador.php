<?php

include '../datos/UsuarioDao.php';

class UsuarioControlador
{

    public static function login($usuario, $password)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::login($obj_usuario);
    }

    public function getUsuario($usuario, $password)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::getUsuario($obj_usuario);
    }

    public function registrar($nombre, $email, $usuario, $password, $privilegio)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setNombre($nombre);
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setEmail($email);
        $obj_usuario->setPrivilegio($privilegio);
        $obj_usuario->setPassword($password);

        return UsuarioDao::registrar($obj_usuario);
    }

}
