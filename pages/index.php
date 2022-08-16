
<?php include('header.php'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<style>
  div.container {
    max-width: 1200px
  }
</style>
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard</h4>
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
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
          <h3 class="box-title">Cursos</h3>
          <ul class="list-inline two-part d-flex align-items-center mb-0">
            <li>
              <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
              </div>
            </li>
            <li class="ms-auto"><span class="counter text-success" id="cursos_dashboard"></span></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
          <h3 class="box-title">Evaluaciones</h3>
          <ul class="list-inline two-part d-flex align-items-center mb-0">
            <li>
              <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
              </div>
            </li>
            <li class="ms-auto"><span class="counter text-purple" id="evaluaciones_dashboard"></span></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
          <h3 class="box-title">Resultados</h3>
          <ul class="list-inline two-part d-flex align-items-center mb-0">
            <li>
              <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
              </div>
            </li>
            <li class="ms-auto"><span class="counter text-info" id="resultados_dashboard"></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- RECENT SALES -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
          <div class="d-md-flex mb-3">
            <h3 class="box-title mb-0">Resultados recientes</h3>
            <!-- <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
              <select class="form-select shadow-none row border-top">
                <option>March 2021</option>
                <option>April 2021</option>
                <option>May 2021</option>
                <option>June 2021</option>
                <option>July 2021</option>
              </select>
            </div> -->
          </div>
          <div class="table-responsive">
            <table class="table no-wrap display nowrap responsive" id="myTable" style="width:100%">
              <thead>
                <tr>
                  <th class="border-top-0  desktop mobile-l mobile-l">#</th>
                  <th class="border-top-0 desktop mobile-l mobile-l">Curso</th>
                  <th class="border-top-0 desktop ">Estado</th>
                  <th class="border-top-0 desktop ">Fecha</th>
                  <th class="border-top-0 desktop ">Puntaje</th>
                </tr>
              </thead>
              <tbody id="resultados_recientes">

              </tbody>
            </table>
          </div>
        </div>
      </div>
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
<script>
  $(document).ready(function() {
    token = localStorage.getItem('token');
    usuario_id = localStorage.getItem('usuario_id');
    $.ajax({
      url: api + 'dashboard/resultados',
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token);
      },
      data: {
        usuario_id: usuario_id
      },
      success: function(data) {
        console.log(data);
        $.each(data.resultado, function(index, value) {
          $('#resultados_recientes').append('<tr><td>' + (index + 1) + '</td><td>' + value.curse_name + '</td><td>' + value.state + '</td><td>' + value.created_at + '</td><td>' + value.result + '</td></tr>');
        });
        $('#resultados_dashboard').text(data.resultado.length);
        $('#cursos_dashboard').text(data.cursos.length);
        $('#evaluaciones_dashboard').text(data.evaluaciones.length);
        $('#myTable').DataTable({
          responsive: true,
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
          }
        });
      },
      error: function() {
        console.log('error');
      },
    });



  });
</script>