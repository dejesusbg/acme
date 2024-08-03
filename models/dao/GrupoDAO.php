<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Grupo.php");

class GrupoDAO
{
    private function toGrupo(
        array $data_table,
        int $indice
    ) {
        return new Grupo(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"],
            $data_table[$indice]["id_grado"],
            $data_table[$indice]["id_mesa"]
        );
    }

    private function fromGrupo(Grupo $grupo)
    {
        return array(
            ':id' => $grupo->getId(),
            ':nombre' => $grupo->getNombre(),
            ':id_grado' => $grupo->getIdGrado(),
            ':id_mesa' => $grupo->getIdMesa()
        );
    }

    public function searchByMesa($id_mesa)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM grupo
                WHERE id_mesa = :id_mesa";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id_mesa' => $id_mesa)
        );

        $grupos = array();
        foreach ($data_table as $indice => $valor) {
            $grupo = $this->toGrupo($data_table, $indice);
            array_push($grupos, $grupo);
        }

        return $grupos;
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM grupo";

        $data_table = $data_source->ejecutarConsulta($sql);

        $grupos = array();
        foreach ($data_table as $indice => $valor) {
            $grupo = $this->toGrupo($data_table, $indice);
            array_push($grupos, $grupo);
        }

        return $grupos;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM grupo 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toGrupo($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Grupo $grupo)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO grupo 
                VALUES (:nombre, :id_grado, :id_mesa)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromGrupo($grupo)
        );

        return $res;
    }

    public function update(Grupo $grupo)
    {
        $data_source = new DataSource();

        $sql = "UPDATE grupo 
                SET nombre = :nombre, 
                    id_grado = :id_grado, 
                    id_mesa = :id_mesa
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromGrupo($grupo)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM grupo 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
