<div class="app-body">
    @include('main._left_side_menu')
    <main class="main">

        @include('main._breadcrumbs')
        <div class="container-fluid">
            <div id="ui-view">
                @yield('content')
            </div>
        </div>
    </main>
</div>
