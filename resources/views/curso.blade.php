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
                                            <b>Estudiantes</b> <a class="float-right">32</a>
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
                                        <li class="nav-item right-4"> <button type="button" class="btn btn-block" style="background-color: #0374b5; color:white" data-toggle="modal" data-target="#modal-default">
                                                <i class="fas fa-layer-group"></i>
                                                Nueva R&uacute;brica
                                            </button></li>
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

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>
            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Crear Nueva Rúbrica</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form>

                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Ciclo</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" disabled value="2022-20">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-1">Docente</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" disabled value="Docente 1">
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">R&uacute;brica</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table data table-bordered my-4">
                                            <thead>
                                                <tr>
                                                    <th> Habilidad Blanda </th>
                                                    <th> Descripci&oacute;n </th>
                                                    <th> Puntaje </th>
                                                    <th> Acciones </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td contenteditable="true" class="data"></td>
                                                    <td contenteditable="true" class="data"></td>
                                                    <td contenteditable="true" class="data"></td>
                                                    <td class="data">
                                                        <div class="btn-group-sm">
                                                            <button class="btn btn-danger delete">
                                                                <i class="fas fa-trash-alt"></i> Delete </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </form>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Guardar</button>
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

    <script src="/js/DataTables/datatables/jquery.dataTables.min.js"></script>

    <script src="/js/DataTables/datatables-bs4/dataTables.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-responsive/dataTables.responsive.min.js"></script>

    <script src="/js/DataTables/datatable-responsive/responsive.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.bootstrap4.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.colVis.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.html5.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/buttons.print.min.js"></script>

    <script src="/js/DataTables/datatable-buttons/dataTables.buttons.min.js"></script>

    <script src="/js/index_rubricas.js"></script>

    <script>
        $(document).on('click', '.edit', function() {
            $(this).parent().siblings('td.data').each(function() {
                var content = $(this).html();
                $(this).html('<input value="' + content + '" />');
            });
            $(this).siblings('.save').show();
            $(this).siblings('.delete').hide();
            $(this).hide();
        });
        $(document).on('click', '.save', function() {
            $('input').each(function() {
                var content = $(this).val();
                $(this).html(content);
                $(this).contents().unwrap();
            });
            $(this).siblings('.edit').show();
            $(this).siblings('.delete').show();
            $(this).hide();
        });
        $(document).on('click', '.delete', function() {
            $(this).parents('tr').remove();
        });
        $('.add').click(function() {
            $(this).parents('table').append('<tr><td class="data"></td><td class="data"></td><td class="data"></td><td><button class="save">Save</button><button class="edit">Edit</button> <button class="delete">Delete</button></td></tr>');
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
        });
        $(function() {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
        });
    </script>



</body>

</html>