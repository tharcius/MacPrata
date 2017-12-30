<!DOCTYPE html>
<html>
@include('main._head')
<body class="app">
@include('main._header')

<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info">NEW</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="...">...</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            ...
        </ol>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <aside class="aside-menu">
        ...
    </aside>

</div>

@include('main._footer')

@include('main._javascript')
</body>
</html>