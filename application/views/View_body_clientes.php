<!DOCTYPE html>
<html lang="en">

<head>
    <?PHP $this->load->view('metas/metatags'); ?>
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
                                    $this->load->view('View_clientes_list');
                            #    break;

                            #default:
                            #        $this->load->view('View_usuarios_list');

                            #}
                        ?>
                    </div>
                </div>
            </div>
        <?PHP $this->load->view('_modal_novocliente');  ?>
        <?PHP $this->load->view('_modal_excluircliente');      ?>
        <?PHP $this->load->view('_modal_editarcliente');   ?>   
        </div>
        <!-- END PAGE CONTAINER-->
    </div>

    <?PHP $this->load->view('metas/footer_scripts') ?>

</body>

</html>
<!-- end document-->