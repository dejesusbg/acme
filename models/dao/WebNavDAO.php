<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../entity/WebNav.php");

class WebNavDAO
{
    private function toWebNav(
        array $data_table,
        int $indice
    ) {
        return new WebNav(
            $data_table[$indice]["id"],
            $data_table[$indice]["nombre"],
            $data_table[$indice]["ruta"],
            $data_table[$indice]["icono"],
            $data_table[$indice]["id_web_ubicacion"],
            $data_table[$indice]["id_rol"]
        );
    }

    private function fromWebNav(WebNav $web_nav)
    {
        return array(
            ':id' => $web_nav->getId(),
            ':nombre' => $web_nav->getNombre(),
            ':ruta' => $web_nav->getRuta(),
            ':icono' => $web_nav->getIcono(),
            ':id_web_ubicacion' => $web_nav->getIdWebUbicacion(),
            ':id_rol' => $web_nav->getIdRol()
        );
    }

    public function searchByRol($id_rol)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_nav 
                WHERE id_rol = :id_rol";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id_rol' => $id_rol)
        );

        $navs = array();
        if (count($data_table) > 0) {
            foreach ($data_table as $indice => $valor) {
                $nav = $this->toWebNav($data_table, $indice);
                array_push($navs, $nav);
            }
        }

        return $navs;
    }

    public function search($id, $idRol)
    {
        $data_source = new DataSource();

        $sql = "SELECT * 
                FROM web_nav 
                WHERE id = :id AND id_rol = :id_rol";

        $data_table = $data_source->ejecutarConsulta(
            $sql,
            array(':id' => $id, 'id_rol' => $idRol)
        );

        $res = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $res = $this->toWebNav($data_table, $indice);
            }
        }

        return $res;
    }

    public function insert(WebNav $web_nav)
    {
        $data_source = new DataSource();

        $sql = "INSERT INTO web_nav 
                VALUES (:nombre, :ruta, :icono, :id_web_ubicacion, :id_rol)";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebNav($web_nav)
        );

        return $res;
    }

    public function update(WebNav $web_nav)
    {
        $data_source = new DataSource();

        $sql = "UPDATE web_nav 
                SET nombre = :nombre, 
                    ruta = :ruta,
                    icono = :icono,
                    id_web_ubicacion = :id_web_ubicacion,
                    id_rol = :id_rol
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            $this->fromWebNav($web_nav)
        );

        return $res;
    }

    public function delete($id, $id_rol)
    {
        $data_source = new DataSource();

        $sql = "DELETE FROM web_nav 
                WHERE id = :id";

        $res = $data_source->ejecutarActualizacion(
            $sql,
            array('id' => $id)
        );

        return $res;
    }
}
