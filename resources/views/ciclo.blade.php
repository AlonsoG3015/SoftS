<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftS UPAO - Cursos</title>

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

                        <li class="nav-item menu-open">
                            <a href="" class="d-flex nav-link" style="background-color: #0374b5; color:white">
                                <i class="nav-icon fas fa-book-reader align-self-center"></i>
                                <p class="px-1">
                                    Acad&eacute;mico
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($lstSemestre as $Semestre)
                                <li class="nav-item active">
                                    @if($semestre_select->semestre == $Semestre->semestre)
                                    <a href="/ciclo/{{$Semestre->semestre}}" class="nav-link active">
                                        <i class="fas        fa-circle nav-icon"></i>
                                        <p>{{ $Semestre->semestre }}</p>
                                    </a>
                                    @else
                                    <a href="/ciclo/{{$Semestre->semestre}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $Semestre->semestre }}</p>
                                    </a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/mantenimiento_usuarios" class="d-flex nav-link">
                                <i class="nav-icon fas fa-users-cog align-self-center"></i>
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
                        <div class="col-sm-9">
                            <h1>{{$semestre}}</h1>
                        </div>
                        @if (session()->get('rol') == 1 )
                        <div class="col col-sm-3 col-auto align-self-end">
                            <button type="button" class=" btn btn-block" style="background-color: #0374b5; color:white" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-layer-group"></i>
                                Nuevo Curso
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row justify-content-end">
                        <div class="col col-sm-3 align-self-end">
                            @if (session()->has('message'))
                            <div class="alert alert-success fade show rounded alert-dismissible" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-md-4 my-5 text-center align-self-center">
                        @foreach($lstCursos as $Curso)
                        <div class="col px-3">
                            <a href="/curso/{{$Curso->id_Curso}}" type="button" class="card my-5 rounded shadow-sm background-info">
                                <div class="py-5 bg-info rounded">
                                    <i class="fas fa-user-graduate fa-10x text-black-50"></i>
                                </div>
                                <h3 class="card-footer w-100 m-0">
                                    {{ $Curso->curso }}
                                </h3>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @if(session()->get('rol') == 1)
            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Crear Nuevo Curso</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmNuevoCurso" method="post" action="/curso/guardar">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="mb-1">L&iacute;nea de Investigaci&oacute;n</label>
                                    <select class="form-control" name="id_Linea">
                                        @foreach ($lstLineas as $Linea)
                                        <option name="id_Linea" value="{{$Linea->id_Line}}">{{$Linea->linea}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Nombre del Curso</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Ciclo</label>
                                    <input type="text" class="form-control" name="ciclo" required readonly value="{{$semestre}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Docente</label>
                                    <select class="form-control" name="docente">
                                        @foreach ($lstDocentes as $Docente)
                                        <option name="docente" value="{{ $Docente->id_Docente }}">{{ $Docente->usuario->persona->nombres }} {{ $Docente->usuario->persona->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" form="frmNuevoCurso" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

                </div>

            </div>
            @endif

        </div>

    </div>


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>