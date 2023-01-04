<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftS UPAO</title>

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="/css/DataTables/datatables-bs4/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="/css/DataTables/datatable-responsive/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="/css/DataTables/datatable-buttons/buttons.bootstrap4.min.css">

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

            <a href="" class="brand-link text-center bg-white p-0 py-2 d-flex">
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
                        <a href="" class="d-block"> {{ session('nombre') }}</a>
                    </div>
                    @endif
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-indent-child" data-widget="treeview" role="menu" data-accordion="false">

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
                                <i class="nav-icon fas fa-users-cog align-self-center"></i>
                                <p class="px-1 justify-between">
                                    Mantenimiento de Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="d-flex nav-link active" style="background-color: #0374b5; color:white">
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
            @if (session()->has('role') == 1)
            <div class="warning">
                <a href="#" class="d-block"> No autorizado </a>
            </div>
            @else
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col col-sm-9 col-auto ">
                            <h1>L&iacute;neas de Investigaci&oacute;n</h1>
                        </div>
                        <div class="col col-sm-3 col-auto align-self-end">
                            <button type="button" class="btn btn-block btn-primary" style="background-color: #0374b5; color:white" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-folder-plus"></i>
                                Nueva L&iacute;nea de investigaci&oacute;n
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre de Linea</th>
                                                <th>Ciclo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lstLineas as $Linea)
                                            <tr>
                                                <td>{{$Linea->id_Line}}</td>
                                                <td>{{$Linea->linea}}</td>
                                                <td>{{$Linea->carrera_ciclo->semestre->semestre}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear L&iacute;nea de investigaci&oacute;n</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputPassword1">Nombre</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="nombre_Linea">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputPassword1">Escuela</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="carrera" disabled value="{{$carrera_Ing->carrera}}" style="font-weight: bold;">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-1">Ciclo</label>
                                        <select class="form-control" name="id_Docente">
                                            @foreach ($lst_Carreras_Ing as $Carrera_Ing_Ciclo)
                                            <option name="docente" value="{{ $Carrera_Ing_Ciclo->Semestre_id }}">{{ $Carrera_Ing_Ciclo->semestre->semestre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>

                    </div>

                </div>

            </section>
            @endif

        </div>

    </div>


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="/js/DataTables/datatables/jquery.dataTables.min.js"></script>

    <script src="/js/DataTables/datatables-bs4/dataTables.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-responsive/dataTables.responsive.min.js"></script>

    <script src="/js/DataTables/datatable-responsive/responsive.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.colVis.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.html5.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.print.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/dataTables.buttons.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
        });
    </script>

</body>

</html>