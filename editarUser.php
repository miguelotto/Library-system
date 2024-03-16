<?php
session_start();
if (!isset($_SESSION['usuario'])) { //seguridad :D
?> <script>
        alert("este usuario no esta autorizado");
        location.href = "login.php";
    </script>

<?php
} else {
    require_once('views/parte_superior.php');
    require_once('models/conexion.php');

    $id = $_GET['id'];


    $sentencia = $bd->prepare("SELECT * FROM bibliotecario WHERE id=?");
    $sentencia->execute([$id]);
    $datos = $sentencia->fetch(PDO::FETCH_OBJ);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>

    <body>
        <section class="vh-100 ">
            <div class="container py-5 h-200">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-secondary text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="controller/grabarUser.php?id=<?php echo $id ?>" method="POST">



                                    <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Modificar bibliotecario</h2>
                                        <br>
                                        <!--           <p class="text-white-50 mb-5">Ingresa tu usuario y contraseña!</p> -->

                                        <div class="form-outline form-white mb-4">
                                            <input value="<?php echo $datos->nombre_usuario ?>" name="nombre_usuario" id="nombre_usuario" class="form-control form-control-lg" />
                                            <label class="form-label" for="usuario">nombre_usuario</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input value="<?php echo $datos->cedula ?>" name="cedula_bibliotecario" id="cedula_bibliotecario" class="form-control form-control-lg" />
                                            <label class="form-label" for="contraseña">Cedula</label>


                                        </div>
                                        <br>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Aceptar</button>



                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </body>

    </html>
    <?php
    require_once('views/parte_inferior.php');
    ?>
<?php
}
?>