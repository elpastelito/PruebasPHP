<?php

include("../Model/db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(titulo, descripcion) VALUES ('$title', '$description')";

    $result = mysqli_query ($conn, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Tarea guardada exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: /Prueba1/index.php");
}

?>