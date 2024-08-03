<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Usuario.php");

class UsuarioDAO
{
    private function toUsuario(
        array $data_table,
        int $indice
    ) {
        return new Usuario(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"],
            $data_table[$indice]["correo"],
            $data_table[$indice]["clave"],
            $data_table[$indice]["nacimiento"],
            $data_table[$indice]["foto"],
            $data_table[$indice]["id_grupo"],
            $data_table[$indice]["id_estado"],
            $data_table[$indice]["id_rol"]
        );
    }

    private function fromUsuario(Usuario $usuario, $extended = true)
    {
        $res = array(
            ':nombre' => $usuario->getNombre(),
            ':correo' => $usuario->getCorreo(),
            ':clave' => $usuario->getClave(),
            ':nacimiento' => $usuario->getNacimiento(),
            ':foto' => $usuario->getFoto(),
            ':id_grupo' => $usuario->getIdGrupo(),
            ':id_rol' => $usuario->getIdRol()
        );

        if ($extended) {
            $res = array_merge($res, [
                ':id' => $usuario->getId(),
                ':id_estado' => $usuario->getIdEstado(),
            ]);
        }

        return $res;
    }

    public function login($correo, $clave)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM usuario 
                WHERE correo = :correo AND clave = :clave";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(
                ':correo' => $correo,
                ':clave' => $clave
            )
        );

        $usuario = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $usuario = $this->toUsuario($data_table, $indice);
            }
        }

        return $usuario;
    }

    public function searchByCorreo($correo)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM usuario 
                WHERE correo = :correo";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':correo' => $correo)
        );

        $usuario = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $usuario = $this->toUsuario($data_table, $indice);
            }
        }

        return $usuario;
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM usuario";

        $data_table = $data_source->ejecutarConsulta($sql);

        $usuarios = array();
        foreach ($data_table as $indice => $valor) {
            $usuario = $this->toUsuario($data_table, $indice);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM usuario 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toUsuario($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Usuario $usuario)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO usuario (nombre, correo, clave, nacimiento, foto, id_grupo, id_rol)
                VALUES (:nombre, :correo, :clave, :nacimiento, :foto, :id_grupo, :id_rol)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromUsuario($usuario, false)
        );

        return $res;
    }

    public function update(Usuario $usuario)
    {
        $data_source = new DataSource();

        $sql = "UPDATE usuario 
                SET nombre = :nombre, 
                    correo = :correo, 
                    clave = :clave,
                    nacimiento = :nacimiento,
                    foto = :foto,
                    id_grupo = :id_grupo,
                    id_estado = :id_estado, 
                    id_rol = :id_rol 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromUsuario($usuario)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM usuario 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
