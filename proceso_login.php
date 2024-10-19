<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $id_tipo_personal = $_POST["tipo_personal"];

    if (empty($usuario) || empty($password) || empty($id_tipo_personal)) {
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    } else {
        include("conexion.php");

        $sql = "SELECT p.idpersonal, p.id_tipopersonal, tp.tipopersonal FROM acceso a
                INNER JOIN personal p ON a.idpersonal = p.idpersonal
                INNER JOIN tipopersonal tp ON p.id_tipopersonal = tp.id_tipopersonal
                WHERE a.usuario = ? AND a.password = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id_personal, $id_tipo_personal_bd, $tipo_personal_nombre);
        $stmt->fetch();

      if ($stmt->num_rows > 0 && strtolower($id_tipo_personal) == strtolower($id_tipo_personal_bd)) {
    // Obtener el nombre del personal desde la base de datos
    $sql_nombre = "SELECT nombre FROM personal WHERE idpersonal = ?";

    $stmt_nombre = $cn->prepare($sql_nombre);
    $stmt_nombre->bind_param("i", $id_personal);
    $stmt_nombre->execute();
    $stmt_nombre->bind_result($nombre_personal);
    $stmt_nombre->bind_result($nombre_personal);
    $stmt_nombre->fetch();
    $stmt_nombre->close();
    
    session_start();
    $_SESSION["idpersonal"] = $id_personal;
    // Redirigir al usuario según el tipo de personal
    $url = strtolower($tipo_personal_nombre) . ".php?idpersonal=" . urlencode($id_personal);
    header("Location: " . $url);
    exit();


        } else {
            // Credenciales inválidas o tipo de personal incorrecto, mostrar mensaje de error con JavaScript
            if ($stmt->num_rows === 0) {
                echo "<script>alert('Revise su nombre de usuario o no es personal de esta empresa.');</script>";
            } else {
                $tipo_personal_seleccionado = "";
                if ($id_tipo_personal == 1) {
                    $tipo_personal_seleccionado = "Administrador";
                } elseif ($id_tipo_personal == 2) {
                    $tipo_personal_seleccionado = "Cajero";
                } elseif ($id_tipo_personal == 3) {
                    $tipo_personal_seleccionado = "Técnico";
                }

                echo "<script>alert('Usuario o contraseña incorrectos o no es " . $tipo_personal_seleccionado . ", inicie sesión como " . $tipo_personal_nombre . "');</script>";
            }
        }

        $stmt->close();
        $cn->close();
    }
}
?>