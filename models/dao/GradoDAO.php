<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Grado.php");

class GradoDAO
{
    private function toGrado(
        array $data_table,
        int $indice
    ) {
        return new Grado(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromGrado(Grado $grado)
    {
        return array(
            ':id' => $grado->getId(),
            ':nombre' => $grado->getNombre()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM grado";

        $data_table = $data_source->ejecutarConsulta($sql);

        $grados = array();
        foreach ($data_table as $indice => $valor) {
            $grado = $this->toGrado($data_table, $indice);
            array_push($grados, $grado);
        }

        return $grados;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM grado 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toGrado($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Grado $grado)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO grado 
                VALUES (:nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromGrado($grado)
        );

        return $res;
    }

    public function update(Grado $grado)
    {
        $data_source = new DataSource();

        $sql = "UPDATE grado 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromGrado($grado)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM grado 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
