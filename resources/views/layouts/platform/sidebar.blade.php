<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index-2.html">E-Commerce</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index-2.html">CP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Aceuil</li>
            <li class="dropdown @if($table == 'dachboard')  active @endif">
                <a href="/dachboard" class="nav-link "><i class="fas fa-fire"></i><span>Aceuil</span></a>
            </li>
            <li class="menu-header">Produit</li>
            <li class="dropdown @if($table == 'Produits')  active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i> <span>Produits</span></a>
                <ul class="dropdown-menu">
                    <li class="@if($table == 'Produits')  active @endif"><a class="nav-link" href="/Produits">List du Produits</a></li>
                    <li ><a class="nav-link beep beep-sidebar" href="/Produits/create">Ajouteé Produit</a></li>
                </ul>
            </li>
            <li class="dropdown @if($table == 'Marques')  active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-brands fa-bandcamp"></i> <span>Marque</span></a>
                <ul class="dropdown-menu">
                    <li class="@if($table == 'Marques')  active @endif"><a class="nav-link" href="/marques">list du Marque</a></li>

                    <li><a class="nav-link beep beep-sidebar" href="/marques/create">Ajoutée Marque</a></li>
                </ul>
            </li>
            <li class="menu-header">Famille</li>
            <li class="dropdown @if($table == 'familles')  active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-bag"></i> <span>Famille</span></a>
                <ul class="dropdown-menu">
                    <li class="@if($table == 'familles')  active @endif"><a class="nav-link" href="/familles">list du Famille</a></li>

                    <li><a class="nav-link beep beep-sidebar" href="/familles/create">Ajoutee Famille</a></li>
                </ul>
            </li>
            <li class="dropdown @if($table == 'sousFamilles')  active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list-ul"></i> <span>Sou Famille</span></a>
                <ul class="dropdown-menu">
                    <li class="@if($table == 'sousFamilles')  active @endif"><a class="nav-link" href="/sous-famille">list du sous-famille</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="/sous-famille/create">Ajoutee</a></li>
                </ul>
            </li>
            <!-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li class="menu-sub-header">Apps</li>
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>

                    <li class="menu-sub-header">Charts</li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                    <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                    <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                    <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li class="menu-sub-header">Tables</li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                    <li class="menu-sub-header">Font Icons</li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                    <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                    <li class="menu-sub-header">Other</li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                </ul>
            </li> -->
        </ul><br>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-power-off "></i>Logout</a>
        </div>
    </aside>
</div>