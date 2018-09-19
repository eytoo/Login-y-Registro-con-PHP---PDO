<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function login($usuario)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve obtener un usuario
     *
     * @param      object         $usuario
     * @return     object
     */
    public static function getUsuario($usuario)
    {
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setPrivilegio($filas["privilegio"]);
        $usuario->setFecha_registro($filas["fecha_registro"]);

        return $usuario;
    }

    /**
     * Metodo que sirve para registrar usuarios
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function registrar($usuario)
    {
        $query = "INSERT INTO usuarios (nombre,email,usuario,password,privilegio) VALUES (:nombre,:email,:usuario,:password,:privilegio)";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":nombre", $usuario->getNombre());
        $resultado->bindValue(":email", $usuario->getEmail());
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());
        $resultado->bindValue(":privilegio", $usuario->getPrivilegio());

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
}
