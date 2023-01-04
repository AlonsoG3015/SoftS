<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftS UPAO</title>

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">

            <a href="/" class="brand-link text-center bg-white p-0 py-2 d-flex">
                <img style="min-height: 75px; min-width: 75px;" src="https://instructure-uploads.s3.amazonaws.com/account_179770000000000001/attachments/1085/1--Nav-logo-C.png" alt="" width="33" height="33">
                <span class="h1 mx-3 my-2">SoftS</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="nav-icon fas fa-user fa-2x text-white mr-2"></i>
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{User}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="/" class="d-flex nav-link">
                                <i class="nav-icon fas fa-book-reader align-self-center"></i>
                                <p class="px-1">
                                    Acad&eacute;mico
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="d-flex nav-link">
                                <i class="nav-icon fas fa-users-cog align-self-center"></i>
                                <p class="px-1 justify-between">
                                    Mantenimiento de Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/lineas" class="d-flex nav-link active" style="background-color: #0374b5; color:white">
                                <i class="nav-icon fas fa-cogs align-self-center"></i>
                                <p class="px-1">
                                    Configuraciones
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-sm-6 ">
                            <h1>Mantenimiento de Usuarios</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-md-12">

                            <div class="card">
                                <div class="card-header" style="background-color: #0374b5; color:white">
                                    <h3 class="card-title bold ">Registro de Nuevo Usuario</h3>
                                </div>

                                <div class="card-body">
                                    <form id="frmRegistroUsuario" class="px-5 py-3" method="post" action="/registro_usuario/guardar">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                    <label class="mb-1">Rol</label>
                                                    <select name="role" id="selectRole" class="form-control">
                                                        <option value="1">Director</option>
                                                        <option value="2">Docente</option>
                                                        <option value="0">Estudiante</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="mb-1">Nombres</label>
                                                    <input class="form-control" type="text" name="nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label class="mb-1">Apellidos</label>
                                                    <input class="form-control" type="text" name="apellidos" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label id="codigo_Uni" class="mb-1">ID</label>
                                                    <input class="form-control" type="text"  name="id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="mb-1">Email</label>
                                                    <input class="form-control" type="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label class="mb-1">Contraseña</label>
                                                    <input id="password_User" class="form-control" type="text" name="password">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer">
                                    <div class="container text-center">
                                        <div class="row justify-content-between">
                                            <button form="frmRegistroUsuario" type="submit" class="btn btn-lg btn-success col-4">Registrar</button>
                                            <a href="/" type="button" class="btn btn-lg btn-danger float-right col-4 ">Cancelar</a>
                                        </div>


                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>
            </section>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script>
        $(document).ready(function() {
            $('#selectRole').change(function() {
                var select_User = document.getElementById('password_User');
                var codigo_Uni = document.getElementById('codigo_Uni');
                if (this.value == 0) {
                    select_User.disabled = true;
                    codigo_Uni.innerHTML = "C&oacute;digo";
                } else {
                    select_User.disabled = false;
                    codigo_Uni.innerHTML = "ID";
                }
            }).change();
        });
    </script>


</body>

</html>