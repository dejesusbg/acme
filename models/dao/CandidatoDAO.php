<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Candidato.php");

class CandidatoDAO
{
    private function toCandidato(
        array $data_table,
        int $indice
    ) {
        return new Candidato(
            $data_table[$indice]["id"],
            $data_table[$indice]["numero"],
            $data_table[$indice]["id_categoria"]
        );
    }

    private function fromCandidato(Candidato $candidato)
    {
        return array(
            ':id' => $candidato->getId(),
            ':numero' => $candidato->getNumero(),
            ':id_categoria' => $candidato->getIdCategoria()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM candidato";

        $data_table = $data_source->ejecutarConsulta($sql);

        $candidatos = array();
        foreach ($data_table as $indice => $valor) {
            $candidato = $this->toCandidato($data_table, $indice);
            array_push($candidatos, $candidato);
        }

        return $candidatos;
    }

    public function searchByCategoria($id_categoria)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM candidato 
                WHERE id_categoria = :id_categoria";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id_categoria' => $id_categoria)
        );

        $candidatos = array();
        foreach ($data_table as $indice => $valor) {
            $candidato = $this->toCandidato($data_table, $indice);
            array_push($candidatos, $candidato);
        }

        return $candidatos;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM candidato 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toCandidato($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Candidato $candidato)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO candidato 
                VALUES (:id, :numero, :id_categoria)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromCandidato($candidato)
        );

        return $res;
    }

    public function update(Candidato $candidato)
    {
        $data_source = new DataSource();

        $sql = "UPDATE candidato 
                SET numero = :numero, 
                    id_categoria = :id_categoria
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromCandidato($candidato)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM candidato 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
