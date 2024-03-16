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
    <section class="vh-100 gradient">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="controller/BuscarUser.php" method="POST">



                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesion</h2>
                                    <p class="text-white-50 mb-5">Ingresa tu usuario y contraseña!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input name="usuario" id="usuario" class="form-control form-control-lg" />
                                        <label class="form-label" for="usuario">Usuario</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input name="contraseña" type="password" id="contraseña" class="form-control form-control-lg" />
                                        <label class="form-label" for="contraseña">Contraseña</label>


                                    </div>
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