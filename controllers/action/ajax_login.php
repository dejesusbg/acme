<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbJurado.php");
require_once (__DIR__ . "/../mdb/mdbTestigo.php");
require_once (__DIR__ . "/../mdb/mdbRol.php");

function login($is_votante, $session = true)
{
        function session_rol($rol_nombre)
        {
                $_SESSION['ID_ROL_LOGIN'] = rol_search_by_nombre($rol_nombre)->getId();
                $_SESSION['ROL_LOGIN'] = $rol_nombre;
                $_SESSION['IS_LOGGED'] = true;
        }

        $rol = null;
        if ($is_votante) {
                $rol = "Solo votante";
                session_rol($rol);
        } else {
                $rol = $_SESSION['ROL_USUARIO'];

                if ($session) {
                        $jurado = jurado_search($_SESSION['ID_USUARIO']);
                        $testigo = testigo_search($_SESSION['ID_USUARIO']);

                        if ($jurado != null) {
                                $array = jurado_array($jurado);
                        } elseif ($testigo != null) {
                                $array = testigo_array($testigo);
                        }

                        array_session($array, 'JURADO');
                        session_rol($rol);
                }
        }

        $res = ["rol_login" => $rol];
        return $res;
}

switch ($_POST['js']) {
        case 'login':
                $email = $_POST['email'];
                $password = $_POST['password'];

                $usuario = usuario_login($email, $password);

                if ($usuario != null) { // puede iniciar sesión
                        array_session($usuario, 'USUARIO');

                        $rol = $_SESSION['ROL_USUARIO'];

                        if ($rol == "Admin") {
                                send_response("Invalid credentials", 401);
                        } else {
                                $is_votante = !in_array($rol, array("Testigo", "Jurado"));

                                $res = login($is_votante, false);
                                send_response($res);
                        }
                } else {
                        send_response("Invalid credentials", 401);
                }

                break;

        case 'custom_login':
                $is_votante = ($_POST['votante'] == "true");

                $res = login($is_votante);
                send_response($res);
                break;

        default:
                send_response("Invalid POST Request", 401);
}
