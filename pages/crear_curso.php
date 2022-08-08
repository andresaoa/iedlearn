<?php include('header.php'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Crear Curso</h4>
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
        <a class="btn btn-primary text-white mb-4" href="cursos.php">
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
                                <label for="exampleInputEmail1">Titulo</label>
                                <input type="text" id="name" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen</label>
                                <input type="text" name="image" id="image" accept="image/*" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Video</label>
                                <input type="text" id="video" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Estado</label>
                                <select name="" id="status" class="form-control">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en proceso">En Proceso</option>
                                    <option value="finalizado">Finalizado</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
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
        var description = $('#description').val();
        var image = $('#image').val();

        var video = $('#video').val();
        var status = $('#status').val();
        // traer el token
        token = localStorage.getItem('token');
        $.ajax({
            url: api + 'curses',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: {
                name: name,
                description: description,
                image: image,
                video: video,
                status: status
            },
            success: function(data) {
                console.log(data);
                Swal.fire(
                    'Curso creado!',
                    'El curso se ha creado correctamente!',
                    'success'
                ).then(function() {
                    window.location.href = 'cursos.php';
                });
            }
        });
    }
</script>