<?php include('header.php'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Crear Rol</h4>
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
                            <a onclick="Guardar();" class="btn btn-success text-white">Guardar</a>
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
    function Guardar() {
        var name = $('#name').val();
        var descripcion = $('#descripcion').val();

        // traer el token
        token = localStorage.getItem('token');
        $.ajax({
            url: api + 'roles',
            type: 'POST',
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
                    'Rol creado!',
                    'El rol se ha creado correctamente!',
                    'success'
                ).then(function() {
                    window.location.href = 'roles.php';
                });
            }
        });
    }
</script>