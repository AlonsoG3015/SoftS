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

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link rel="stylesheet" href="/css/App/rubrica.css" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.2.3/css/dx.light.css" />

    <script src="https://cdn3.devexpress.com/jslib/22.2.3/js/dx.all.js"></script>

    <script src="/js/index_rubricas.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css" />

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
                        <a href="" class="d-block"> {{ session('nombre') }}</a>
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
                            <h1>{{$Curso->curso}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <h3 class="profile-username text-center">{{$Curso->curso}}</h3>
                                    <p class="text-muted text-center">{{$Curso->linea->linea}}</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Estudiantes</b> <a class="float-right">{{count($lstEstudiantes->estudiantes)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Semanas</b> <a class="float-right">16</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#rubrica" data-toggle="tab">R&uacute;bricas</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#evaluacion" data-toggle="tab">Evaluaci&oacute;n</a></li>
                                        <li class="nav-item right-4">
                                            <button type="button" class="btn btn-block" style="background-color: #0374b5; color:white" data-toggle="modal" data-target="#modal-default">
                                                <i class="fas fa-layer-group"></i>
                                                Nueva R&uacute;brica
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="rubrica">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Ciclo</th>
                                                                            <th>Accion</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>000123457</td>
                                                                            <td>Alumno 1</td>
                                                                            <td>Apellido 1</td>
                                                                            <td>X</td>
                                                                            <td>X</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>000123456</td>
                                                                            <td>Alumno 1</td>
                                                                            <td>Apellido 1</td>
                                                                            <td>X</td>
                                                                            <td>X</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="evaluacion">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table id="example2" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nombre</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Ciclo</th>
                                                                            <th>Email</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($lstEstudiantes->estudiantes as $Estudiante)
                                                                        <tr>
                                                                            <td>{{$Estudiante->persona->nombres}} </td>
                                                                            <td>{{$Estudiante->persona->apellidos}} </td>
                                                                            <td>{{$Estudiante->less_cicle}} </td>
                                                                            <td>{{$Estudiante->persona->email}} </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>
            <div class="modal fade" id="modal-default" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Crear Nueva Rúbrica</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="frmNuevaRubrica" method="post" action="/rubrica/guardar">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label>Nombre</label>
                                    <input name="nombre_rubrica" type="text" class="form-control" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Curso</label>
                                    <input id="id_Curso" name="id_Curso" class="form-control" disabled value="{{$Curso->id_Curso}}" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Docente</label>
                                    <input type="text" class="form-control" required disabled value="{{ $Docente->usuario->persona->nombres }} {{ $Docente->usuario->persona->apellidos }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Nivel de la R&uacute;brica</label>
                                    <select class="form-control" name="nv_rubrica">
                                        @foreach ($lstNiveles_Ru as $Nivel_Rubrica)
                                        <option id="nv_rubrica" name="nv_rubrica" value="{{ $Nivel_Rubrica->id_NR }}">{{ $Nivel_Rubrica->nivel_R }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">R&uacute;brica</h3>
                                    </div>
                                    <div class="container my-2">
                                        <table id="tabla_rubrica" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Criterios</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lstHabilidades->habilidad_curso as $Habilidad)
                                                <tr>
                                                    <td class="text-center">{{$Habilidad->habilidad_blanda->habilidad}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" form="frmNuevaRubrica" class="btn btn-success">Guardar</button>
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

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>

    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>

    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tabla_rubrica').DataTable({

            });
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
        });
        $(function() {
            $("#example2").DataTable({
                dom: 'Bfrtip',
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }).buttons().container().appendTo('#example2 .col-md-6:eq(0)');
        });
    </script>



</body>

</html>