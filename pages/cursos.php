<?php include('header.php'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cursos</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- tabla con los cursos -->
            <div class="col-md-12">
                <!-- boton crear curso -->
                <div class="card">

                    <div class="card-body">
                        <a href="crear_curso.php" type="button" class="btn btn-primary mb-4">
                            Crear curso
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="cursos_todos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-body">
                        <h3 class="box-title mb-0">Cursos Recientes</h3>
                    </div>
                    <div class="comment-widgets" id="cursos_recientes">
                        <!-- Comment Row -->

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-heading">
                        <h3 class="box-title mb-0">Curso Populares</h3>
                    </div>
                    <div class="card-body">
                        <ul class="chatonline" id="cursos_mas_vistos">

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->

    </div>
    <!-- /.row -->
    <!-- .row -->
</div>

<?php include 'footer.php'; ?>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        token = localStorage.getItem('token');

        $.ajax({
            url: api + 'curses',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: 'GET',
            success: function(data) {

                console.log(data.cursos_mas_vistos);
                cursos_mas_vistos = data.cursos_mas_vistos;
                cursos_recientes = data.cursos_recientes;
                cursos_todos = data.cursos_todos;

                $.each(cursos_mas_vistos, function(index, value) {
                    $('#cursos_mas_vistos').append(
                        '<li>' +
                        '<a href="curso.php?id=' + value.id + '">' +
                        '<div class="chat-content">' +
                        '<h5 class="box-title">' + value.name + '</h5>' +
                        '<div class="box-content">' +
                        '<span class="font-weight-bold">' + value.description + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</li>'
                    );
                });

                $.each(cursos_recientes, function(index, value) {
                    $('#cursos_recientes').append(
                        '<div class="d-flex flex-row comment-row p-3 mt-0">' +
                        '<div class="comment-text ps-2 ps-md-3 w-100">' +
                        '<h5 class="font-medium">' + value.name + '</h5>' +
                        '<span class="mb-3 d-block">' + value.description + '</span>' +
                        '<div class="comment-footer d-md-flex align-items-center">' +
                        '<span class="badge bg-primary rounded">' + value.status + '</span>' +
                        '<div class="text-muted fs-2 ms-auto mt-2 mt-md-0">' + value.created_at + '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );
                });

                $.each(cursos_todos, function(index, value) {
                    $('#cursos_todos').append(
                        '<tr>' +
                        '<td>' + value.id + '</td>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.description + '</td>' +
                        '<td>' +
                        '<a href="curso.php?id=' + value.id + '" class="mr-4">' +
                        '<button class="btn btn-primary">Ver</button>' +
                        '</a>' +
                        // boton editar curso
                        '<a href="editar_curso.php?id=' + value.id + '" class="mr-4">' +
                        '<button class="btn btn-warning">Editar</button>' +
                        '</a>' +
                        // boton eliminar curso con modal
                        '<button class="btn btn-danger text-white" onclick="eliminar_curso(' + value.id + ')">Eliminar</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });

                $('#myTable').DataTable({
                    responsive: true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });

            }
        });


    });

    function eliminar_curso(id) {
        Swal.fire({
            title: '¿Estas seguro?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: api + 'curses/' + id,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    type: 'DELETE',
                    success: function(data) {
                        Swal.fire(
                            'Eliminado!',
                            'El curso ha sido eliminado.',
                            'success'
                        )
                        location.reload();
                    }
                });
            }
        });
    }
</script>