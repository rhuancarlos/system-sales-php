<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?PHP echo $metatitle; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?PHP echo base_url('assets/css/font-face.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?PHP echo base_url('assets/vendor/bootstrap-4.1/bootstrap.min.css')?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?PHP echo base_url('assets/vendor/animsition/animsition.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/wow/animate.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/slick/slick.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/select2/select2.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?PHP echo base_url('assets/css/theme.css')?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                            <?PHP if(isset($mensagem)){ 
                                echo '<div class="alert alert-danger" role="alert">' .
                                        $mensagem; 
                                    '</div>';
                            } ?>
                        <div class="login-logo">
                            <a href="<?PHP echo base_url(); ?>">
                                <!-- <img src="<?PHP //echo base_url('assets/images/icon/logo.png')?>" alt="CoolAdmin"> -->
                                <p>System Sales</p>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?PHP echo base_url('Login/Autentica'); ?>" method="post">
                                <div class="form-group">
                                    <label>MATRICULA</label>
                                    <input class="au-input au-input--full" type="text" name="matricula" placeholder="insira sua matricula" required maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label>SENHA</label>
                                    <input class="au-input au-input--full" type="password" name="senha" placeholder="insira sua senha" required="" maxlength="10">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div><small>v 1.5.0 | <? echo $by;?> <br></small>
                    <small>Acesso: 1234 | 1234</small>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?PHP echo base_url('assets/vendor/jquery-3.2.1.min.js')?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-4.1/popper.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-4.1/bootstrap.min.js')?>"></script>
    <!-- Vendor JS       -->
    <script src="<?PHP echo base_url('assets/vendor/slick/slick.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/wow/wow.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/animsition/animsition.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/counter-up/jquery.waypoints.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/counter-up/jquery.counterup.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/circle-progress/circle-progress.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/chartjs/Chart.bundle.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/select2/select2.min.js')?>"></script>

    <!-- Main JS-->
    <script src="<?PHP echo base_url('assets/js/main.js')?>"></script>

</body>

</html>
<!-- end document-->