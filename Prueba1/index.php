<?php
    include ("Model/db.php");
    include ("View/includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); }?>
            <div class="card card-body">
                <form action="/Prueba1/Controller/save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" id=""rows="3" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn--success btn-clock" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>titulo</th>
                        <th>descripción</th>
                        <th>Creado en</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)) {
                    ?>
                    <tr>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['creado_en'] ?></td>
                        <td>
                            <a href="Controller/edit.php?id=<?php echo $row['id']?>">Editar</a>
                            <a href="Controller/delete.php?id=<?php echo $row['id']?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include ("View/includes/footer.php");
?>