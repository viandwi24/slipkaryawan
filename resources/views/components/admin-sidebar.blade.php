@php
    $user_role = 'admin';
    $menus = [
        ['type' => 'item', 'role' => "all", 'text' => 'Dashboard', 'link' => route('admin.home'), 'icon' => 'fa-tachometer-alt'],
        ['type' => 'header', 'role' => "all", 'text' => 'Master Data'],
        ['type' => 'item', 'role' => 'all', 'text' => 'Slip Gaji', 'link' => route('admin.slip-gaji'), 'icon' => 'fa-money-check-alt'],
    ];
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME', 'Laravel') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menus as $menu)
                    @if($menu['type'] == 'treeview')
                        @php
                            $tr_ada = false;
                            if (@$menu['role'] == "all") {}
                            elseif (!@in_array($user_role, $menu['role'])) { continue; }
                        @endphp
                        @foreach ($menu['menu'] as $item)
                            <?php if (Request::url() == @$item['link']) $tr_ada = true; ?>
                        @endforeach
                        <li class="nav-item has-treeview {{ $tr_ada ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                @isset($menu['icon'])
                                    <i class="fas far {{ $menu['icon'] }} nav-icon"></i>
                                @endisset
                                <p>
                                    {!! $menu['text'] !!}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($menu['menu'] as $item)
                                    <li class="nav-item">
                                        <a href="{{ @$item['link'] }}" class="nav-link {{ Request::url() == @$item['link'] ? 'active' : '' }}">
                                            <i class="nav-icon fas far {{ @$item['icon'] }}"></i>
                                            <p>
                                            {!! $item['text'] !!}
                                            </p>
                                        </a>
                                    </li>                            
                                @endforeach
                            </ul>
                        </li>
                    @elseif($menu['type'] == 'item')
                        @php
                            if (@$menu['role'] == "all") {}
                            elseif (!@in_array($user_role, $menu['role'])) { continue; }
                        @endphp
                        <li class="nav-item">
                            @isset($subitem['match'])    
                                <a href="{{ @$menu['link'] }}" class="nav-link {{ Request::is(@$menu['match']) ? 'active' : '' }}">
                            @else
                                <a href="{{ @$menu['link'] }}" class="nav-link {{ Request::url() == @$menu['link'] ? 'active' : '' }}">
                            @endisset
                                <i class="nav-icon fas far {{ @$menu['icon'] }}"></i>
                                <p>
                                {!! $menu['text'] !!}
                                </p>
                            </a>
                        </li>
                    @elseif($menu['type'] == 'header')
                        @php
                            if (@$menu['role'] == "all") {}
                            elseif (!@in_array($user_role, $menu['role'])) { continue; }
                        @endphp
                        <li class="nav-header">{!! $menu['text'] !!}</li>     
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>