<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Testigo.php");

class TestigoDAO
{
    private function toTestigo(
        array $data_table,
        int $indice
    ) {
        return new Testigo(
            $data_table[$indice]["id"],
            $data_table[$indice]["id_mesa"]
        );
    }

    private function fromTestigo(Testigo $testigo)
    {
        return array(
            ':id' => $testigo->getId(),
            ':id_mesa' => $testigo->getIdMesa()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM testigo";

        $data_table = $data_source->ejecutarConsulta($sql);

        $testigos = array();
        foreach ($data_table as $indice => $valor) {
            $testigo = $this->toTestigo($data_table, $indice);
            array_push($testigos, $testigo);
        }

        return $testigos;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM testigo 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toTestigo($data_table, $indice);
            }
        }


        return $res;
    }

    public function insert(Testigo $testigo)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO testigo 
                VALUES (:id, :id_mesa)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromTestigo($testigo)
        );

        return $res;
    }

    public function update(Testigo $testigo)
    {
        $data_source = new DataSource();
        
        $sql = "UPDATE testigo 
                SET id_mesa = :id_mesa
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromTestigo($testigo)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM testigo 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
