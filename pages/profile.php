<?php include('header.php'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perfil</h4>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img  class="thumb-lg img-circle" alt="img" id="avatar_profile"></a>
                                <h4 class="text-white mt-2" id="name_user_profile"></h4>
                                <h5 class="text-white mt-2" id="email_user_profile"></h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="user-btm-box mt-5 d-md-flex">
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>258</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>125</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>556</h1>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nombre completo</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" readonly placeholder="Johnathan Doe" class="form-control p-0 border-0" id="name_user_profile_input">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Correo</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" readonly placeholder="johnathan@admin.com" class="form-control p-0 border-0" name="example-email" id="email_user_profile_input">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Contraseña</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" readonly value="password" class="form-control p-0 border-0">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Telefono</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" readonly placeholder="123 456 7890" class="form-control p-0 border-0" id="telefono_user_profile_input">
                                </div>
                            </div>
                            <!-- <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>

<?php include('footer.php'); ?>