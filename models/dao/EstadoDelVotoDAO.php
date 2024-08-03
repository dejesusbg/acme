<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/EstadoDelVoto.php");

class EstadoDelVotoDAO
{
    private function toEstadoDelVoto(
        array $data_table,
        int $indice
    ) {
        return new EstadoDelVoto(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromEstadoDelVoto(EstadoDelVoto $estado_del_voto)
    {
        return array(
            ':id' => $estado_del_voto->getId(),
            ':nombre' => $estado_del_voto->getNombre()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM estado_del_voto";

        $data_table = $data_source->ejecutarConsulta($sql);

        $estados = array();
        foreach ($data_table as $indice => $valor) {
            $estado = $this->toEstadoDelVoto($data_table, $indice);
            array_push($estados, $estado);
        }

        return $estados;
    }

    public function searchByNombre($nombre)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM estado_del_voto 
                WHERE nombre = :nombre";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':nombre' => $nombre)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toEstadoDelVoto($data_table, $indice);
            }
        }

        return $res;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM estado_del_voto 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toEstadoDelVoto($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(EstadoDelVoto $estado)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO estado_del_voto 
                VALUES (:id, :nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromEstadoDelVoto($estado)
        );

        return $res;
    }

    public function update(EstadoDelVoto $estadoDelVoto)
    {
        $data_source = new DataSource();

        $sql = "UPDATE estado_del_voto 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromEstadoDelVoto($estadoDelVoto)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM estado_del_voto 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
