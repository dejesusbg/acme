<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/Categoria.php");

class CategoriaDAO
{
    private function toCategoria(
        array $data_table,
        int $indice
    ) {
        return new Categoria(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"]
        );
    }

    private function fromCategoria(Categoria $categoria)
    {
        return array(
            ':id' => $categoria->getId(),
            ':nombre' => $categoria->getNombre()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM categoria";

        $data_table = $data_source->ejecutarConsulta($sql);

        $categorias = array();
        foreach ($data_table as $indice => $valor) {
            $categoria = $this->toCategoria($data_table, $indice);
            array_push($categorias, $categoria);
        }

        return $categorias;
    }

    public function searchByNombre($nombre)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM categoria 
                WHERE nombre = :nombre";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':nombre' => $nombre)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toCategoria($data_table, $indice);
            }
        }

        return $res;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM categoria 
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toCategoria($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(Categoria $categoria)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO categoria 
                VALUES (:nombre)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromCategoria($categoria)
        );

        return $res;
    }

    public function update(Categoria $categoria)
    {
        $data_source = new DataSource();

        $sql = "UPDATE categoria 
                SET nombre = :nombre
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromCategoria($categoria)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM categoria 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
