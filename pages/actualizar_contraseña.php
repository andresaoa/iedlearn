<?php include('header.php'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cambiar contraseña</h4>
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
        <a class="btn btn-primary text-white mb-4" href="usuarios.php">
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
                                <label for="exampleInputEmail1">Contraseña</label>
                                <input type="password" id="password" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmar contraseña</label>
                                <input type="password" id="password_confirm" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="actualizar_contraseña()">Actualizar</button>
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
            url: api+'users/<?php echo $_GET['id']; ?>',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(data) {
                user = data.user;
                $('#name').val(user.name);
                $('#email').val(user.email);

                $('#rol').val(data.rol);
            }
        });
    });


    function actualizar_contraseña() {
        // validar que ambos campos sean iguales
        if($('#password').val() != $('#password_confirm').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las contraseñas no coinciden',
            })
        } else {
            token = localStorage.getItem('token');
            $.ajax({
                url: api+'users/<?php echo $_GET['id']; ?>/password',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: {
                    password: $('#password').val()
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Contraseña actualizada',
                    }).then(function() {
                        window.location.href = 'usuarios.php';
                    });
                }
            });
        }
    }
</script>