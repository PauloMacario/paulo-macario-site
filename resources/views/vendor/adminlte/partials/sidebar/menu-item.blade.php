@inject('sidebarItemHelper', 'JeroenNoten\LaravelAdminLte\Helpers\SidebarItemHelper')

@if ($sidebarItemHelper->isHeader($item))

    {{-- Header --}}
    @include('adminlte::partials.sidebar.menu-item-header')

@elseif ($sidebarItemHelper->isLegacySearch($item) || $sidebarItemHelper->isCustomSearch($item))

    {{-- Search form --}}
    @include('adminlte::partials.sidebar.menu-item-search-form')

@elseif ($sidebarItemHelper->isMenuSearch($item))

    {{-- Search menu --}}
    @include('adminlte::partials.sidebar.menu-item-search-menu')

@elseif ($sidebarItemHelper->isSubmenu($item))

    {{-- ########  Ifs para controle do menu antes de implementar permissoes e middlewares ####### --}}

    @if (auth()->user()->id != 1 && $item['text'] == "CONTROL FINANCE")
        @include('adminlte::partials.sidebar.menu-item-treeview-menu')
    @endif

    @if (auth()->user()->id ==1 )
        @include('adminlte::partials.sidebar.menu-item-treeview-menu')
    @endif

    {{-- ###### Include original (Sem if acima)########## --}}

    {{-- Treeview menu --}}
    
    {{--  @include('adminlte::partials.sidebar.menu-item-treeview-menu') --}}

@elseif ($sidebarItemHelper->isLink($item))

    {{-- Link --}}
    @include('adminlte::partials.sidebar.menu-item-link')

@endif
