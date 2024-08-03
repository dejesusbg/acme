<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Voto.php");

class VotoDAO
{
    private function toVoto(
        array $data_table,
        int $indice
    ) {
        return new Voto(
            $data_table[$indice]["id"],
            $data_table[$indice]["id_mesa"],
            $data_table[$indice]["id_candidato"]
        );
    }

    private function fromVoto(Voto $voto)
    {
        return array(
            ':id_mesa' => $voto->getIdMesa(),
            ':id_candidato' => $voto->getIdCandidato()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM voto";

        $data_table = $data_source->ejecutarConsulta($sql);

        $votos = array();
        foreach ($data_table as $indice => $valor) {
            $voto = $this->toVoto($data_table, $indice);
            array_push($votos, $voto);
        }

        return $votos;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM voto 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toVoto($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Voto $voto)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO voto (id_mesa, id_candidato)
                VALUES (:id_mesa, :id_candidato)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromVoto($voto)
        );

        return $res;
    }

    public function update(Voto $voto)
    {
        $data_source = new DataSource();

        $sql = "UPDATE voto 
                SET id_mesa = :id_mesa, 
                    id_candidato = :id_candidato
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromVoto($voto)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM voto WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
