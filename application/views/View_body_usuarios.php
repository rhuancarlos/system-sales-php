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
    <link href="<?PHP echo base_url('assets/vendor/vector-map/jqvmap.min.css')?>" rel="stylesheet" media="all">
    <link href="<?PHP echo base_url('assets/css/datatables.min.css')?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?PHP echo base_url('assets/css/theme.css')?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?PHP $this->load->view('_main'); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <?PHP $this->load->view('_sidebar-header'); ?>
            </header>
            <!-- END HEADER DESKTOP-->
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <h4><?PHP echo $getcontroller . ' > ' .  $this->uri->segment(1)?></h4>
                        </div>
                        <div class="card-body">
                        <?PHP
                            #switch ($getmethod){
                            #    case 'getUsers':
                                    $this->load->view('View_usuarios_list');
                            #    break;

                            #default:
                            #        $this->load->view('View_usuarios_list');

                            #}
                        ?>
                    </div>
                </div>
            </div>
        <?PHP $this->load->view('_modal_novousuario'); ?>
        <?PHP $this->load->view('_modal_excluir'); ?>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>

    <?PHP $this->load->view('footer_scripts') ?>

</body>

</html>
<!-- end document-->