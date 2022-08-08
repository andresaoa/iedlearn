
// const api = "http://127.0.0.1:8000/api/";
const api = "https://thawing-bayou-03317.herokuapp.com/api/";

var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');

function login() {
  var use = document.getElementById("usuario").value;
  var cla = document.getElementById("clave").value;
  var campos = document.getElementById('mensaje');
  if (use == '') {
    campos.innerHTML = '<div class="alert alert-danger" role="alert">Debes de digitar el usuario</div>';
    return false;
  } else {
    campos.innerHTML = '';
  }
  if (cla == '') {
    campos.innerHTML = '<div class="alert alert-danger" role="alert">Debes de digitar la clave</div>';
    return false;
  } else {
    campos.innerHTML = '';
  }

  Swal.showLoading()
  const datos = { email: use, password: cla };
  axios.post(api + 'auth/login', datos)
    .then(function (res) {

      if (res.status == 200) {

        if (res.datos !== 0) {
          console.log(res.data);
          // variables de sesion
          token = localStorage.setItem('token', res.data.access_token);
          usuario_id = localStorage.setItem('usuario_id', res.data.user.id);
          usuario_nombre = localStorage.setItem('usuario_nombre', res.data.user.name);
          usuario_email = localStorage.setItem('usuario_email', res.data.user.email);
          usuario_rol = localStorage.setItem('usuario_rol', res.data.rol.role_id);
          usuario_phone = localStorage.setItem('usuario_phone', res.data.user.phone);

          window.location = 'pages/index.php';
        } else {
          Swal.fire('Usuario o contraseña incorrecta');
        }
      }
      console.log('rep:' + res);
    })
    .catch(function (err) {
      Swal.fire('Usuario o contraseña incorrecta');
      console.log(err);
    })
    .then(function () {
      //loading.style.display = 'none';
      // Swal.close();
    });
}

function registro() {
  var name = document.getElementById("name_register").value;
  var email = document.getElementById("email_register").value;
  var password = document.getElementById("password_register").value;

  if (name == '') {
    mensaje.innerHTML = '<div class="alert alert-danger" role="alert">Debes de digitar el nombre</div>';
    return false;
  } else {
    mensaje.innerHTML = '';
  }
  if (email == '') {
    mensaje.innerHTML = '<div class="alert alert-danger" role="alert">Debes de digitar el email</div>';
    return false;
  }
  else {
    mensaje.innerHTML = '';
  }
  if (password == '') {
    mensaje.innerHTML = '<div class="alert alert-danger" role="alert">Debes de digitar la contraseña</div>';
    return false;
  }
  else {
    mensaje.innerHTML = '';
  }

  Swal.showLoading();
  const datos = { name: name, email: email, password: password };
  axios.post(api + 'auth/register', datos)
    .then(function (res) {
      if (res.status == 201) {
        if (res.datos !== 0) {
          Swal.fire('Registro exitoso');
          console.log(res.data);
          // variables de sesion

          window.location = 'index.html';
        } else {
          Swal.fire('Error al registrar');
        }
      }
      console.log('rep:' + res);
    }
    )
    .catch(function (err) {
      Swal.fire('Error al registrar');
      console.log(err);
    }
    )
    .then(function () {
      //loading.style.display = 'none';
      // Swal.close();
    });
}

