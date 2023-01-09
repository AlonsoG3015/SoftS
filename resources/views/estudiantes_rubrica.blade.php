<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftS UPAO</title>

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.semanticui.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.semanticui.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">

    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.semanticui.min.css">


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
                    @if (session()->has('nombre'))
                    <div class="info">
                        <a href="/perfil" class="d-block"> {{ session('nombre') }}</a>
                    </div>
                    @endif
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="/" class="d-flex nav-link active" style="background-color: #0374b5; color:white">
                                <i class="nav-icon fas fa-book-reader align-self-center"></i>
                                <p class="px-1">
                                    Acad&eacute;mico
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantenimiento_usuarios" class="d-flex nav-link">
                                <i class=" nav-icon fas fa-users-cog align-self-center"></i>
                                <p class="px-1 justify-between">
                                    Mantenimiento de Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/lineas" class="d-flex nav-link">
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

                            <div class="col-sm-6 ">
                                <h1>{{$Rubrica->nombre_rub}} - {{$Curso->curso}}</h1>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="container-fluid align-items-end">
                    <div class="row justify-content-end">
                        <div class="col-sm-3">
                            @if (session()->has('message'))
                            <div class="alert alert-success fade show rounded alert-dismissible" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>



            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <hr>

                        <div class="card">
                            <div class="card-body">
                                <table id="rubrica" class="ui celled table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Curso->estudiantes as $estudiante)
                                        <tr>
                                            <td>{{$estudiante->persona->nombres}} </td>
                                            <td>{{$estudiante->persona->apellidos}} </td>
                                            <td>{{$estudiante->persona->email}} </td>
                                            <td class="d-flex justify-content-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/estudiante/rubrica/{{$Rubrica->id_RC}}/{{$estudiante->id_Estudiante}}" type="button" class="btn btn-dark align-self-stretch">
                                                        <i class="fas fa-pen-alt"></i>
                                                        Evaluar
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="p-0 py-2 modal-footer justify-content-between">
                            <a href="/curso/{{$Curso->id_Curso}}" type="button" class="btn btn-lg btn-secondary">
                                <i class="fas fa-chevron-left mr-2"></i>
                                Regresar al Curso
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/editor.semanticui.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#rubrica').DataTable();
        });
    </script>

</body>

</html>