<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="#"><img src="{{asset('admin/assets/img/logo-pengha.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        @if (auth()->user()->role=='admin')
        <form class="navbar-form navbar-left" method="GET" action="/pegawai">
            <div class="input-group">
                <input name="cari" type="text" value="" class="form-control" placeholder="Cari Pegawai">
                <span class="input-group-btn"><button type="submit" class="btn btn-outline-primary">Go</button></span>
            </div>
        </form>
        @endif
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                    <a href="#"> <i class="lnr lnr-user"></i><span>{{auth() -> user() -> name}}</span></a>
                </li>
                
                <li class="dropdown">
                    <a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                </li>
                <!-- <li>
                    <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                </li> -->
            </ul>
            
        </div>
    </div>
</nav>