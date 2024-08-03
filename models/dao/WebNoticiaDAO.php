<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/WebNoticia.php");
class WebNoticiaDAO
{
    private function toWebNoticia(
        array $data_table,
        int $indice
    ) {
        return new WebNoticia(
            $data_table[$indice]["id"],
            $data_table[$indice]["titulo"],
            $data_table[$indice]["subtitulo"],
            $data_table[$indice]["descripcion"],
            $data_table[$indice]["imagen"]
        );
    }

    private function fromWebNoticia(WebNoticia $web_noticia)
    {
        return array(
            ':id' => $web_noticia->getId(),
            ':titulo' => $web_noticia->getTitulo(),
            ':subtitulo' => $web_noticia->getSubtitulo(),
            ':descripcion' => $web_noticia->getDescripcion(),
            ':imagen' => $web_noticia->getImagen()
        );
    }

    public function get()
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_noticia";

        $data_table = $data_source->ejecutarConsulta($sql);

        $noticias = array();
        foreach ($data_table as $indice => $valor) {
            $noticia = $this->toWebNoticia($data_table, $indice);
            array_push($noticias, $noticia);
        }

        return $noticias;
    }

    public function search($id)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_noticia
                WHERE id = :id";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toWebNoticia($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(WebNoticia $web_noticia)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO web_noticia 
                VALUES (:titulo, :subtitulo, :descripcion, :imagen)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebNoticia($web_noticia)
        );

        return $res;
    }

    public function update(WebNoticia $web_noticia)
    {
        $data_source = new DataSource();

        $sql = "UPDATE web_noticia 
                SET titulo = :titulo,
                    subtitulo = :subtitulo,
                    descripcion = :descripcion,
                    imagen = :imagen
                WHERE id = :id ";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebNoticia($web_noticia)
        );

        return $res;
    }

    public function delete($id)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM web_noticia 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
