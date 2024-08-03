<?php

require_once __DIR__ . "/ajax.php";
require_once __DIR__ . "/serv_mail.php";

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbRol.php");

switch ($_POST['js']) {
    case 'forgot':
        $email = $_POST['email'];
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $alt = $_POST['alt'];

        // verificar que es estudiante
        $usuario = usuario_search_by_correo($email);
        $id_admin = rol_search_by_nombre("Admin")->getId();

        if ($usuario != null and $usuario->getIdRol() != $id_admin) {
            $id = $usuario->getId();

            $html = file_get_contents($body);
            $html = str_replace("%id%", $id, $html);

            echo $html;

            $res = send_mail($email, $to, $subject, $html, $alt);
            send_response($res);
        } else {
            send_response("Invalid credentials", 401);
        }

        break;

    case 'forgot-login':
        $id = $_POST['id'];
        $usuario = usuario_search($id);

        $res = null;
        if ($usuario != null) {
            $res = usuario_array($usuario, true);
            array_session($res, "USUARIO");

            $_SESSION['ID_ROL_LOGIN'] = rol_search_by_nombre("Solo votante")->getId();
            $_SESSION["ROL_LOGIN"] = "Solo votante";
            $_SESSION['IS_LOGGED'] = true;
        }

        send_response($res);
        break;

    default:
        send_response("Invalid POST request", 401);
}
