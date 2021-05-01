<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashborad</title>
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard.css')}}"/>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Shop</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="{{route('categories.index')}}">Categoies</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Products</a>
        </div>
    </div>
    <!-- Page Content-->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('assets/js/admin/dashboard.js')}}"></script>
</body>
</html>
