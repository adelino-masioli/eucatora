<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('build/images/brand_white.png')}}" alt="{{AppHelper::site_title()}}" width="100"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{!! AppHelper::activate_menu(array('dashboard/customer*')) !!}"><a href="{{url('dashboard/customers')}}"><i class="fa fa-user" aria-hidden="true"></i> Clientes</a></li>
                <li class="{!! AppHelper::activate_menu(array('dashboard/provider*', '/', 'dashboard')) !!}"><a href="{{url('dashboard/providers')}}"><i class="fa fa-users" aria-hidden="true"></i> Fornecedores</a></li>
                <li class="{!! AppHelper::activate_menu(array('dashboard/product*')) !!}"><a href="{{url('dashboard/products')}}"><i class="fa fa-cubes" aria-hidden="true"></i> Produtos</a></li>
                <li class="{!! AppHelper::activate_menu(array('dashboard/purchase*')) !!}"><a href="{{url('dashboard/purchases')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Compras</a></li>
                <li class="{!! AppHelper::activate_menu(array('dashboard/sale*')) !!}"><a href="{{url('dashboard/sales')}}"><i class="fa fa-minus-circle" aria-hidden="true"></i> Vendas</a></li>
                <li class="{!! AppHelper::activate_menu(array('dashboard/financial*')) !!}"><a href="{{url('dashboard/financials')}}"><i class="fa fa-usd" aria-hidden="true"></i> Financeiro</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Administrador <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="hidden"><a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i> Meus dados</a></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                        <li role="separator" class="divider hidden"></li>
                        <li class="hidden"><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Ajuda</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>