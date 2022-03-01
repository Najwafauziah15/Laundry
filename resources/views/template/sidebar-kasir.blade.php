<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/homeKasir"
                        aria-expanded="false"><i class="icon-ghost"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>                        
                @auth
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/transaksi"
                    aria-expanded="false"><i class="icon-wallet"></i><span
                        class="hide-menu">Transaksi</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/laporan"
                    aria-expanded="false"><i class="icon-notebook"></i><span
                        class="hide-menu">Laporan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/pengguna"
                    aria-expanded="false"><i class="icon-user"></i><span
                        class="hide-menu">Member</span></a></li> 
                @else
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/login"
                    aria-expanded="false"><i class="icon-login"></i><span
                        class="hide-menu">Login</span></a>
                </li>  
                @endauth
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>