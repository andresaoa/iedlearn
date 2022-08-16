<?php include('header.php'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Rol <span id="nombre_rol"></span></h4>
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
        <a class="btn btn-primary text-white mb-4" href="roles.php">
            Volver
        </a>
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row">

            <!-- tabla con los cursos -->
            <div class="col-md-12">
                <!-- boton crear curso -->
                <div class="card">

                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" id="name" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion</label>
                                <textarea name="" id="descripcion" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </form>
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
<?php include('footer.php'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // traer los datos del curso
        token = localStorage.getItem('token');
        $.ajax({
            url: api+'roles/<?php echo $_GET['id']; ?>',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(data) {
                user = data.rol;
                $('#name').val(user.name);
                $('#descripcion').val(user.description);
                $('#nombre_rol').html(user.name);
            }
        });
    });


    function Guardar() {
        // traer el token
        token = localStorage.getItem('token');
        // traer los datos del formulario
        var name = $('#name').val();
        var descripcion = $('#descripcion').val();
        // enviar los datos al servidor
        $.ajax({
            url: api + 'roles/<?php echo $_GET['id']; ?>',
            type: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: {
                name: name,
                descripcion: descripcion
            },
            success: function(data) {
                console.log(data);
                Swal.fire(
                    'Rol editado!',
                    'El rol se ha editado correctamente!',
                    'success'
                ).then(function() {
                    window.location.href = 'roles.php';
                });
            }
        });
    }
</script>