<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/WebUbicacion.php");

class WebUbicacionDAO
{
    private function toWebUbicacion(
        array $data_table,
        int $indice
    ) {
        return new WebUbicacion(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromWebUbicacion(WebUbicacion $web_ubicacion)
    {
        return array(
            ':id' => $web_ubicacion->getId(),
            ':nombre' => $web_ubicacion->getNombre()
        );
    }

    public function searchByNombre($nombre)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_ubicacion
                WHERE nombre = :nombre";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':nombre' => $nombre)
        );

        $ubicacion = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $ubicacion = $this->toWebUbicacion($data_table, $indice);
            }
        }

        return $ubicacion;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_ubicacion
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toWebUbicacion($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(WebUbicacion $web_ubicacion)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO web_ubicacion 
                VALUES (:nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebUbicacion($web_ubicacion)
        );

        return $res;
    }

    public function update(WebUbicacion $web_ubicacion)
    {
        $data_source = new DataSource();

        $sql = "UPDATE web_ubicacion 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebUbicacion($web_ubicacion)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM web_ubicacion 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
