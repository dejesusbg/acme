<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Mesa.php");

class MesaDAO
{
    private function toMesa(
        array $data_table,
        int $indice
    ) {
        return new Mesa(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromMesa(Mesa $mesa)
    {
        return array(
            ':id' => $mesa->getId(),
            ':nombre' => $mesa->getNombre()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM mesa";

        $data_table = $data_source->ejecutarConsulta($sql);

        $mesas = array();
        foreach ($data_table as $indice => $valor) {
            $mesa = $this->toMesa($data_table, $indice);
            array_push($mesas, $mesa);
        }

        return $mesas;
    }

    public function searchByNombre($nombre)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM mesa 
                WHERE nombre = :nombre";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':nombre' => $nombre)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toMesa($data_table, $indice);
            }
        }

        return $res;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM mesa 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toMesa($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Mesa $mesa)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO mesa 
                VALUES (:nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromMesa($mesa)
        );

        return $res;
    }

    public function update(Mesa $mesa)
    {
        $data_source = new DataSource();

        $sql = "UPDATE mesa 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromMesa($mesa)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM mesa 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
