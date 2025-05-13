<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img">
                <img src="{{ asset('dashAdmin/assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">KONTEN</span>
                </li>

                @if (Auth::user()->hasRole('admin'))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/muser" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Manage User</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/kelas" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Manage Kelas</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->hasRole('guru_bk'))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-alert-circle"></i>
                            </span>
                            <span class="hide-menu">Permintaan Konseling</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-alert-circle"></i>
                            </span>
                            <span class="hide-menu">Penjadwalan Konseling</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->hasRole('wali_kelas'))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-cards"></i>
                            </span>
                            <span class="hide-menu">Daftar Siswa</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->hasRole('siswa'))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-description"></i>
                            </span>
                            <span class="hide-menu">Mengajukan Konseling</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
