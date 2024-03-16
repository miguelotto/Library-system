<?php
session_start();
if (!isset($_SESSION['usuario'])) { //seguridad :D
?> <script>
        alert("este usuario no esta autorizado");
        location.href = "login.php";
    </script>

<?php
} else {
    require_once('views/parte_superior.php')

?>
    <div class="container">
        <div class="container">
            <h1>Nuevo Libro</h1>
            <form action="controller/grabarNewLibro.php" method="POST">

                <div class="form-group"> <!-- Nombred -->
                    <label for="full_name_id" class="control-label">Nombres del Autor</label>
                    <input type="text" class="form-control" id="autor_name" name="autor_name" placeholder="Ejemplo: Ana Maria">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Apellidos del Autor</label>
                    <input type="text" class="form-control" id="autor_apellido" name="autor_apellido" placeholder="Ejemplo: Rosa Estrada ">
                </div>

                <div class="form-group"> <!-- Titulo -->
                    <etiqueta para="street1_id" class="control-label">Titulo del libro</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ejemplo: Cien Años de Soledad">
                </div>

                <div class="form-group"> <!-- Numero de ejemplares-->
                    <etiqueta para="street1_id" class="control-label">Numero de Ejemplares</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Coloque solo numeros">
                </div>
                <br>

                <div clase="form-group"> <!-- Botón Enviar -->
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>

            </form>



        </div>


    </div>



    <?php
    require_once('views/parte_inferior.php')

    ?>
<?php } ?>