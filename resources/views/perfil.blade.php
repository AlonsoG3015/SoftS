<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftS UPAO</title>

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="/css/App/rubrica.css" type="text/css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" />

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
                        <a href="" class="d-block "> {{ session('nombre') }}</a>
                    </div>
                    @endif
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
                            <a href="/mantenimiento_usuarios" class="d-flex nav-link">
                                <i class=" nav-icon fas fa-users-cog align-self-center"></i>
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
                    <div class="row mb-2">
                        <div class="col-sm-9">
                            <h1>Perfil</h1>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success col-sm-3 fade show rounded alert-dismissible" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <hr>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center mb-3">
                                        <i class="nav-icon fas fa-user fa-6x mr-2"></i>
                                    </div>
                                    <h3 class="profile-username text-center">{{$Usuario->usuario->persona->nombres}} {{$Usuario->usuario->persona->apellidos}}</h3>
                                    @if($Usuario->usuario->Role_id == 1)
                                    <p class="text-muted text-center">DIRECTOR</p>
                                    @else
                                    <p class="text-muted text-center">DOCENTE</p>
                                    @endif
                                </div>

                            </div>


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Sobre Mi</h3>
                                </div>

                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p class="text-muted">Malibu, California</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                    <p class="text-muted">
                                        <span class="tag tag-danger">UI Design</span>
                                        <span class="tag tag-success">Coding</span>
                                        <span class="tag tag-info">Javascript</span>
                                        <span class="tag tag-warning">PHP</span>
                                        <span class="tag tag-primary">Node.js</span>
                                    </p>
                                    <hr>
                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="d-flex nav-link active" href="#activity" data-toggle="tab">
                                                <i class="nav-icon fas fa-book align-self-center"></i>
                                                <p class="px-2">Cursos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="d-flex nav-link" href="#settings" data-toggle="tab">
                                                <i class="nav-icon fas fa-user-edit align-self-center"></i>
                                                <p class="px-2">Editar</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">

                                            @foreach($Usuario->cursos as $curso)

                                            <div class="post">
                                                <div class="user-block d-flex">
                                                    <i class="fas fa-book fa-2x text-info"></i>
                                                    <span class="username ml-3">
                                                        <a href="#">{{$curso->curso}} - {{$curso->linea->carrera_ciclo->semestre->semestre}}</a>
                                                    </span>
                                                </div>
                                                <p>
                                                    L&iacute;nea de Investigaci&oacute;n: <strong>{{$curso->linea->linea}}</strong>
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" method="post" action="/perfil/guardar">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">C&oacute;digo</label>
                                                    <div class="col-sm-10">
                                                        <input name="id" type="text" class="form-control" readonly value="{{$Usuario->usuario->login}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nombres</label>
                                                    <div class="col-sm-10">
                                                        <input name="nombres" type="text" class="form-control" value="{{$Usuario->usuario->persona->nombres}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Apellidos</label>
                                                    <div class="col-sm-10">
                                                        <input name="apellidos" type="text" class="form-control" value="{{$Usuario->usuario->persona->apellidos}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input name="email" type="email" class="form-control" value="{{$Usuario->usuario->persona->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Rol</label>
                                                    <div class="col-sm-10">
                                                        <input name="role_id" type="text" class="form-control" disabled value="{{$Usuario->usuario->Role_id}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
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


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="/js/index_rubricas.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

</body>

</html>