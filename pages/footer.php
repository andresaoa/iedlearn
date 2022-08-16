<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center"> Desarrollado por: </footer>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/app-style-switcher.js"></script>
<script src="../assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!--Wave Effects -->
<script src="../assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../assets/js/custom.js"></script>
<script src="../js/index.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="../assets/plugins/bower_components/chartist/dist/chartist.min.js"></script>
<script src="../assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/js/pages/dashboards/dashboard1.js"></script>


<script>
  $(document).ready(function() {
    validarLogueo();
    inicial_nombre = window.localStorage.getItem("usuario_nombre");
    document.getElementById("name_user2").innerHTML = inicial_nombre;
    console.log(inicial_nombre);
    inicial_nombre = inicial_nombre.split('');
    inicial_nombre = inicial_nombre[0];
    // inicial apellido
    inicial_apellido = window.localStorage.getItem("usuario_nombre");
    inicial_apellido = inicial_apellido.split(' ');
    inicial_apellido = inicial_apellido[1];
    inicial_apellido = inicial_apellido.split('');
    inicial_apellido = inicial_apellido[0];

    nombre = window.localStorage.getItem("usuario_nombre");
    email = window.localStorage.getItem("usuario_email");
    telefono = window.localStorage.getItem("usuario_telefono");
    rol = window.localStorage.getItem("usuario_rol");

    console.log(rol);
    // roles
    if (rol == 2) {
      document.getElementById("usuarios_panel").style.display = "none";
      document.getElementById("roles_panel").style.display = "none";
      document.getElementById("cursos_panel").style.display = "none";
      document.getElementById("evaluaciones_panel").style.display = "none";
      document.getElementById("resultados_panel").style.display = "none";

      console.log("rol 2");

    }
    
    document.getElementById("avatar").src = generateAvatar(
      inicial_nombre + inicial_apellido,
      "white",
      "#009578"
    );
    document.getElementById("avatar_profile").src = generateAvatar(
      inicial_nombre + inicial_apellido,
      "white",
      "#009578"
    );
    // perfil
    document.getElementById("name_user_profile").innerHTML = nombre;
    document.getElementById("name_user_profile_input").value = nombre;
    document.getElementById("email_user_profile").innerHTML = email;
    document.getElementById("email_user_profile_input").value = email;
    document.getElementById("telefono_user_profile_input").value = telefono;
  });

  // valida si el usuario esta logueado
  function validarLogueo() {
    console.log("validarLogueo");
    if (window.localStorage.getItem("usuario_nombre") == null) {
      window.location.href = "../index.html";
    }
  }
  // cerrar sesion
  function cerrarSesion() {
    window.localStorage.clear();
    window.location.href = "../index.html";
  }

  function generateAvatar(
    text,
    foregroundColor = "white",
    backgroundColor = "black"
  ) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    canvas.width = 200;
    canvas.height = 200;

    // Draw background
    context.fillStyle = backgroundColor;
    context.fillRect(0, 0, canvas.width, canvas.height);

    // Draw text
    context.font = "bold 100px Assistant";
    context.fillStyle = foregroundColor;
    context.textAlign = "center";
    context.textBaseline = "middle";
    context.fillText(text, canvas.width / 2, canvas.height / 2);

    return canvas.toDataURL("image/png");
  }
</script>
</body>

</html>