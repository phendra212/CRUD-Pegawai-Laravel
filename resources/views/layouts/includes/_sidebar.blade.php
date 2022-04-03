<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
                @if (auth()->user()->role=='admin')
                <li><a href="/pegawai" class=""><i class="lnr lnr-users"></i> <span>Data Pegawai</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>