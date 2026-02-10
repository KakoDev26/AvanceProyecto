<?php
require_once __DIR__ . '/../bd/Conexion.php';
require_once __DIR__ . '/../modelo/Usuario.php';


class UsuarioDao
{
    public function autenticar($nombre, $clave)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE nombre = :nombre AND clave = :clave");

        $stmt->execute([
            'nombre' => $nombre,
            'clave' => $clave
        ]);


        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $user = new Usuario();

            $user->id = $fila['id'];
            $user->nombre = $fila['nombre'];
            //$user->correo = $fila['correo'];
            //$user->rol = $fila['rol'];
            return $user;
        }
        return null;
    }


    public function listarTodos()
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sql = "SELECT id, nombre, correo, clave, rol
                FROM usuario
                ORDER BY id";

        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorId($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        //no se si se selecciona la clave pero bueno
        $sql = "SELECT id, nombre, correo, clave, rol 
                FROM usuario
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $usuario = new Usuario();
            $usuario->id = $row['id'];
            $usuario->nombre = $row['nombre'];
            $usuario->correo = $row['correo'];
            $usuario->rol = $row['rol'];
            return $usuario;
        }
        return null;
    }
    public function registrar($usuario)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlInsert = "INSERT usuario (nombre, correo, clave, rol)
                      VALUES (:nombre, :correo, :clave, :rol)";

        $stmt = $pdo->prepare($sqlInsert);

        return $stmt->execute([
            ':nombre' => $usuario->nombre,
            ':correo' => $usuario->correo,
            ':clave' => $usuario->clave,
            ':rol' => $usuario->rol
        ]);
    }

    public function actualizarUsuario($usuario)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlUpdate = "UPDATE usuario SET 
                        nombre = :nombre,
                        correo = :correo,
                        rol = :rol
                      WHERE id = :id";
        $stmt = $pdo->prepare($sqlUpdate);

        return $stmt->execute([
            ':nombre' => $usuario->nombre,
            ':correo' => $usuario->correo,
            ':rol' => $usuario->rol,
            ':id' => $usuario->id
        ]);
    }
    public function eliminar($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlDelete = "DELETE FROM usuario WHERE id = :id";

        $stmt = $pdo->prepare($sqlDelete);

        return $stmt->execute([':id' => $id]);
    }
}
