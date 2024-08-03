<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Rol.php");

class RolDAO
{
    private function toRol(
        array $data_table,
        int $indice
    ) {
        return new Rol(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromRol(Rol $rol)
    {
        return array(
            ':id' => $rol->getId(),
            ':nombre' => $rol->getNombre()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM rol";

        $data_table = $data_source->ejecutarConsulta($sql);

        $roles = array();
        foreach ($data_table as $indice => $valor) {
            $rol = $this->toRol($data_table, $indice);
            array_push($roles, $rol);
        }

        return $roles;
    }

    public function searchByNombre($nombre)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM rol 
                WHERE nombre = :nombre";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':nombre' => $nombre)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toRol($data_table, $indice);
            }
        }

        return $res;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM rol 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toRol($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Rol $rol)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO rol
                VALUES (:nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromRol($rol)
        );

        return $res;
    }

    public function update(Rol $rol)
    {
        $data_source = new DataSource();

        $sql = "UPDATE rol 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromRol($rol)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM rol 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
