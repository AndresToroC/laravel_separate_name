<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="{{route('home')}}" >
                <img src="" class="header-brand-img" alt="Logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="fas fa-user" style="line-height: 2em; color: #000;"></span>
                        <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">{{Auth::user()->name}}</span>
                            <small class="text-muted d-block mt-1">
                                admin
                            </small>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="">
                            <i class="dropdown-icon fas fa-user"></i> Perfil
                        </a>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="dropdown-icon fas fa-sign-out-alt"></i> Salir
                        </a>
                    </div>
                </div>
            </div>
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                    <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fas fa-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('names.index')}}" class="nav-link"><i class="fas fa-list"></i> Nombres</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fas fa-calendar"></i> Components</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="" class="dropdown-item ">Example</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>