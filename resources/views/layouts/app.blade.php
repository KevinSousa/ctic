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
    @yield('title')
    <link rel="shortcut icon" href="favicon.ico" />
        <!-- Fontfaces CSS-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
</head>
<script src=”./fullcalendar/locale/pt-br.js”></script>
<script src=’fullcalendar/fullcalendar.js’></script>
<script src=”./fullcalendar/locale/pt-br.js”></script>
<script src=’fullcalendar/lang-all.js’></script>
<script>
$(function() {
$(‘#calendar’).fullCalendar({
        lang: ‘pt-br’;
    });
});
</script>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="/icon/logo-ifpe.png" alt="IFPE" margin-left="0px" width="4000em" height="4000em" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            @can('user')
                                <a href="{{route('chamados.add')}}">
                                    <i class="fas fa-phone"></i>Adicionar Chamados</a>
                            @endcan        
                            @can('admin')
                            <a class="js-arrow" href="#">
                                <i class="fas fa-plus"></i>Adicionar</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{route('equipamento.create')}}"><i class="fas fa-wrench"></i>Equipamentos</a>
                                    </li>
                                    <!-- <li>
                                        <a href="{{route('user.cadastrar')}}"><i class="fas fa-user"></i>Usuarios</a>
                                    </li> -->
                                    <li>
                                        <a href="{{route('sala.adicionar')}}"><i class="fas fa-home"></i>Salas</a>
                                    </li>
                                    <li>
                                        <a href="{{route('tiposProblemas.create')}}"><i class="fas fa-cogs"></i>Tipos de Problemas</a>
                                    </li>
                                    <li>
                                        <a href="{{route('funcao.create')}}"><i class="fas fa-chart-bar"></i>Funções</a>
                                    </li>
                            </ul>
                                @endcan
                        </li>
                        @can('admin')
                            <li>
                                <a class="js-arrow" href="#" style="color: red;">
                                    <i class="fas fa-list"></i>Visualizar
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
    <!--                                 <li>
                                        <a href="{{route('chamados.index')}}"><i class="fas fa-phone"></i>Chamados</a>
                                    </li> -->
                                    <li>
                                        <a href="{{route('equipamento.index')}}"><i class="fas fa-wrench"></i>Equipamentos</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.home')}}"><i class="fas fa-user"></i>Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="#" url="/sala" class="listAJAX"><i class="fas fa-home"></i>Salas</a>
                                    </li>                                
                                    <li>
                                        <a href="#" url="/tiposProblemas" class="listAJAX"><i class="fas fa-cogs"></i>Tipos de Problemas</a>
                                    </li>
                                    <li>
                                        <a href="{{route('funcao.index')}}"><i class="fas fa-chart-bar"></i>Funções</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <li>
                            <a href="{{route('chamados.index')}}" style="color: green;">
                                <i class="fas fa-list-ul"></i>Visualizar Chamados
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-check-square"></i>Formulários</a>
                        </li>
                        <li>
                            <a href="{{route('calendar')}}">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i>Mapas</a>
                        </li>
           <!--              <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Paginas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Entrar</a>
                                </li>
                                <li>
                                    <a href="register.html">Cadastre-se</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Esqueceu a senha</a>
                                </li>
                            </ul>
                        </li> -->
<!--                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
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
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Procurar por .." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Você tem 2 mensagens</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/icon/avatar-06.jpg" alt="Ezreal" />
                                                </div>
                                                <div class="content">
                                                    <h6>Marcos Andrade</h6>
                                                    <p>A sala de Informática do Bloco B está disponivel para a proxima Segunda Feira?</p>
                                                    <span class="time">3 min</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Paulo Diamont</h6>
                                                    <p>O projetor da sala 02 do Bloco C não está funcionando! </p>
                                                    <span class="time">Ontem</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">Ver todas as mensagens</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>Você tem 3 novos emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Utilizou nossa plataforma</p>
                                                    <span>Marcos Andrade, 3 min</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Utilizou nossa plataforma</p>
                                                    <span>Carlos Harvey, Ontem</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Utilizou nossa plataforma</p>
                                                    <span>Paulo Diamond, 12 Abril 2019</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">Veja todos os emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Você tem 3 notificações</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Você recebeu um email de notificação</p>
                                                    <span class="date">12 Abril 2018, 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Sua conta foi bloqueada</p>
                                                    <span class="date">12 Abril 2018, 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Você tem um novo arquivo</p>
                                                    <span class="date">12 Abril 2018, 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">Todas as notificações</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/icon/avatar-01.jpg" alt="Bertonni" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->user_name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/icon/avatar-01.jpg" alt="{{ Auth::user()->user_name }}" />
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
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Conta</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configuração</a>
                                                </div>
<!--                                                 <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
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
                </div>
            </header>
            <div class="main-content container">
                @yield('content')
            </div>
        </div>

    </div>
    
    @yield('js')

    <script src="/js/listAjax.js"></script>

</body>

</html>