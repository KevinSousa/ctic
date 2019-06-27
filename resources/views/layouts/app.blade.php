<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    @yield('title')
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
        <!-- Fontfaces CSS-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">

        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="/logohelp2.png" alt="IFPE" margin-left="0px" width="4000em" height="4000em" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">

                            @can('user')
                            <a class="js-arrow" id="adc-menu" href="#">
                                <i class="fas fa-phone"></i>Adicionar Chamados</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#" url="/chamados/add" id="adc-cham" class="listAJAX"><i class="fab fa-wpforms" ></i>Formulário Simplificado</a>
                                    </li>
                                    <li>
                                        <a href="/chamados/add3d" id="adc-cham-3d"><i class="fas fa-cube"></i>Chamado Mapeado em 3d</a>
                                    </li>
                                </ul>
                                <li>
                                    <a href="#" url="/chamados" id="visu-chamados" class="listAJAX"><i class="fas fa-list"></i>Visualizar Chamados</a>
                                </li>
                            @endcan  

                            @can('admin')
                            <a class="js-arrow" id="adc-menu" href="#">
                                <i class="fas fa-plus"></i>Adicionar</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#" url="/equipamento/create" id="adc-equip" class="listAJAX"><i class="fas fa-wrench"></i>Equipamentos</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/sala/adicionar" id="adc-sala" class="listAJAX"><i class="fas fa-home"></i>Laboratórios</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/tiposProblemas/create" id="adc-tipo" class="listAJAX"><i class="fas fa-cogs"></i>Tipos de Problemas</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/funcao/create" id="adc-funcao" class="listAJAX"><i class="fas fa-chart-bar"></i>Funções</a>
                                    </li>
                            </ul>
                            @endcan
                        
                        </li>
                        @can('admin')
                            <li>
                                <a class="js-arrow" id="vis-menu" href="#" style="">
                                    <i class="fas fa-list"></i>Visualizar
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#" url="/chamados" id="visu-chamados" class="listAJAX"><i class="fas fa-phone"></i>Chamados</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/equipamento" id="visu-equips" class="listAJAX"><i class="fas fa-wrench"></i>Equipamentos</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/user" id="visu-users" class="listAJAX"><i class="fas fa-user"></i>Usuários</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/sala" id="visu-sala" class="listAJAX"><i class="fas fa-home"></i>Laboratórios</a>
                                    </li>                                
                                    <li>
                                        <a href="#" url="/tiposProblemas" id="visu-tipo-problemas" class="listAJAX"><i class="fas fa-cogs"></i>Tipos de Problemas</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/funcao" id="visu-funcoes" class="listAJAX"><i class="fas fa-chart-bar"></i>Funções</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <li class="">
                            <a class="js-arrow" id="vis-calendar" href="#" style="">
                                    <i class="fas fa-calendar-alt"></i>Calendário
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#" url="/calendar" id="visu-calendar" class="listAJAX">
                                        <i class="fas fa-eye"></i>Visualizar</a>
                                </li>
                            @can('professor')
                                <li>
                                    <a href="#" url="/calendar/addEvent" id="reserv-calendar" class="listAJAX">
                                        <i class="fas fa-calendar-plus"></i>Reservar LAB</a>
                                </li>
                                <li>

                                    <a href="#" url="/calendar/show/" id="my-reserv-calendar" class="listAJAX">
                                        <i class="fas fa-calendar-plus"></i>Minhas Reservas</a>

                                </li>
                            @endcan 
                            @can('admin')
                                <li>
                                    <a href="#" url="/calendar/addEvent" id="reserv-calendar" class="listAJAX">
                                        <i class="fas fa-calendar-plus"></i>Reservar LAB</a>
                                </li>
                                <li>
                                    <a href="#" url="/calendar/show" id="my-reserv-calendar" class="listAJAX">
                                        <i class="fas fa-calendar-check"></i>Minhas Reservas</a>
                                </li>
                            @endcan 
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap" style="float:right;">
                            <div class="header-button">                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div  class="image">
                                            <img src="{{isset(Auth::user()->user_imagem) ? '/icon/user/'.Auth::user()->user_imagem : '/icon/user/avatar-01.jpg' }}" alt="{{ Auth::user()->user_name }}" />
                                        </div>
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->user_name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{isset(Auth::user()->user_imagem) ? '/icon/user/'.Auth::user()->user_imagem : '/icon/user/avatar-01.jpg' }}" alt="{{ Auth::user()->user_name }}" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->user_name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->user_email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#" class="listAJAX" url="/user/editar/{{Auth::user()->user_id}}">
                                                        <i class="zmdi zmdi-account"></i>Conta
                                                    </a>
                                                </div>

                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>
                                                      {{ __('Sair') }}
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                         @csrf
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </header>
            <div class="main-content container">
                @yield('content')
            </div>
        </div>

    </div>
    
    @yield('js')
    <script src="/js/listAjax.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="/vendor/Inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>