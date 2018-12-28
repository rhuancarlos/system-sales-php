        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?PHP echo base_url('assets/images/icon/logo-white.png')?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?PHP echo base_url('assets/images/icon/avatar-big-01.jpg')?>" alt="John Doe" />
                    </div>
                    <h4 class="name"><?PHP echo $this->session->userdata('nome'); ?></h4>
                    <a href="<?PHP echo base_url('Login/logout');?>">Sair</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?PHP echo base_url();?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard

                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Clientes
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-table"></i>Novos</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-check-square"></i>Ver Todos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Produtos
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-table"></i>Novos</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-check-square"></i>Ver Todos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Vendas
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-table"></i>Vendas</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-check-square"></i>Vendas do Dis</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-check-square"></i>Realizados</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>