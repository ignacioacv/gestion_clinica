<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <!--Logo-->
        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-2">Citas</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- Menu lateral -->
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Inicio</div>
            </a>
        </li>
        <!-- Pages -->
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-book-content"></i>
            <div data-i18n="Layouts">Citas</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                    <div data-i18n="Without menu">Ver citas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                    <div data-i18n="Without navbar">Calendario de citas</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-book-content"></i>
            <div data-i18n="Layouts">Consultas</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                    <div data-i18n="Without menu">Ver consultas</div>
                    </a>
                </li>
                
            </ul>
        </li>
    </ul>
</aside>
