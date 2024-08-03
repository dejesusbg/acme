<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Jurado.php");

class JuradoDAO
{
    private function toJurado(
        array $data_table,
        int $indice
    ) {
        return new Jurado(
            $data_table[$indice]["id"],
            $data_table[$indice]["id_mesa"]
        );
    }

    private function fromJurado(Jurado $jurado)
    {
        return array(
            ':id' => $jurado->getId(),
            ':id_mesa' => $jurado->getIdMesa()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM jurado";

        $data_table = $data_source->ejecutarConsulta($sql);

        $jurados = array();
        foreach ($data_table as $indice => $valor) {
            $jurado = $this->toJurado($data_table, $indice);
            array_push($jurados, $jurado);
        }

        return $jurados;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM jurado 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toJurado($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Jurado $jurado)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO jurado 
                VALUES (:id, :id_mesa)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromJurado($jurado)
        );

        return $res;
    }

    public function update(Jurado $jurado)
    {
        $data_source = new DataSource();
        
        $sql = "UPDATE jurado 
                SET id_mesa = :id_mesa
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromJurado($jurado)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM jurado 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
