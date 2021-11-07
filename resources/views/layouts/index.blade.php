

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel=" stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Listado-Registro</title>
</head>
<body>

<div class="sidebar">
    <a  href="#"><i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;Home</a>
    <a href="{{ url('/') }}"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; Libro</a>
    <a  href="{{ url('/contenido')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Registro</a>
    <a  href="{{ url ('/lenguaje/listado') }}"><i class="fas fa-laptop-code"></i>&nbsp; Lenguajes</a>

</div>
<style>
    .sidebar {
        height: 100%;
        width: 280px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color:#E9967A;
        overflow-x: hidden;
        padding-top: 18px;
    }

    /* Style sidebar links */
    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 35px;
        color: white;
        display: block;
    }

    /* Style links on mouse-over */
    .sidebar a:hover {
        color: #CD5C5C;
    }

    /* Style the main content */
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    /* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
    }

</style>
<div class="container">
    @yield('contenido')
</div>

</body>
</html>

