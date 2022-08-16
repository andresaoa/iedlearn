
<?php include('./header.php'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Roles</h4>
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
                        <a href="crear_rol.php" type="button" class="btn btn-primary mb-4">
                            Crear Rol
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
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
            <!-- /.col -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->

    </div>
    <!-- /.row -->
    <!-- .row -->
</div>

<?php include './footer.php'; ?>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        token = localStorage.getItem('token');

        $.ajax({
            url: api + 'roles',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: 'GET',
            success: function(data) {

                console.log(data.users);
                roles = data.roles;

                $.each(roles, function(index, value) {
                    $('#cursos_todos').append(
                        '<tr>' +
                        '<td>' + value.id + '</td>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.description + '</td>' +
                        '<td>' +
                        '<a href="ver_rol.php?id=' + value.id + '" class="mr-4">' +
                        '<button class="btn btn-primary">Ver</button>' +
                        '</a>' +
                        // boton editar curso
                        '<a href="editar_rol.php?id=' + value.id + '" class="mr-4">' +
                        '<button class="btn btn-warning">Editar</button>' +
                        '</a>' +
                        // boton eliminar curso con modal
                        '<button class="btn btn-danger text-white" onclick="eliminar_rol(' + value.id + ')">Eliminar</button>' +
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

    function eliminar_rol(id) {
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
                    url: api + 'roles/' + id,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    type: 'DELETE',
                    success: function(data) {
                        Swal.fire(
                            'Eliminado!',
                            'El rol ha sido eliminado.',
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    }
                });
            }
        });
    }
</script>