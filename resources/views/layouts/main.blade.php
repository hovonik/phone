<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashborad</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Shop</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="{{route('categories.index')}}">Categoies</a>
            <a class="list-group-item list-group-item-action bg-light" href="{{route('products.index')}}">Products</a>
        </div>
    </div>
    <!-- Page Content-->
    <div id="page-content-wrapper">
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
