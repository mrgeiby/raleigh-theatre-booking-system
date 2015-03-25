<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raleigh Theatre</title>

    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{!! URL::to('/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! URL::to('/css/jquery-ui.css') !!}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{!! URL::to('/js/jquery-2.1.3.min.js') !!}"></script>
    <script src="{!! URL::to('/js/jquery-ui.js') !!}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you show the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Raleigh Theatre</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{!! URL::to('/') !!}">Home</a></li>
                <li><a href="{!! URL::to('/about') !!}">About Us</a></li>
                <li><a href="{!! URL::to('/schedule') !!}">Schedule</a></li>
                <li><a href="{!! URL::to('/productions') !!}">Productions</a></li>
                <li><a href="{!! URL::to('/basket') !!}">Basket</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{!! URL::to('/auth/login') !!}">Login</a></li>
                    <li><a href="{!! URL::to('/auth/register') !!}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{!! URL::to('/customer/show') !!}">View Account Details</a></li>
                            <li><a href="{!! URL::to('/customer/edit') !!}">Update Account Details</a></li>
                            @if(Auth::user()->hasRole('Administrator'))
                                <li class="divider"></li>
                                <li><a href="{!! URL::to('/roles') !!}">Manage Roles</a></li>
                                <li><a href="{!! URL::to('/users') !!}">Manage Users</a></li>
                            @endif

                            @if((Auth::user()->hasRole('Manager')) || (Auth::user()->hasRole('Administrator')) )
                                <li class="divider"></li>
                                <li><a href="{!! URL::to('/productionTypes') !!}">Manage Production Types</a></li>
                                <li><a href="{!! URL::to('/productions/manage') !!}">Manage Productions</a></li>
                                <li><a href="{!! URL::to('/performances') !!}">Manage Performances</a></li>
                            @endif
                            <li class="divider"></li>
                            <li><a href="{!! URL::to('/auth/logout') !!}"><b><div align="center" class="panel panel-default"><h4>LOGOUT</h4></div></b></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--@if (Auth::guest())--}}
                    {{--<li><a href="/auth/login">Login</a></li>--}}
                    {{--<li><a href="/auth/register">Register</a></li>--}}
                {{--@else--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                           {{--aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><b><div align="center" class="panel panel-default">YOUR ACCOUNT</div></b></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="/customer/show">View Account Details</a></li>--}}
                            {{--<li><a href="/customer/edit">Update Account Details</a></li>--}}
                            {{--@if(Auth::user()->hasRole('Manager'))--}}
                                {{--<!-- <li class="divider"></li> -->--}}
                                {{--<li><b><div align="center" class="panel panel-default">USERS / ROLES</div></b></li>--}}
                                {{--<!-- <li class="divider"></li> -->--}}
                                {{--<li><a href="/roles">Manage Roles</a></li>--}}
                                {{--<li><a href="/users">Manage Users</a></li>--}}
                                {{--<br />--}}
                                {{--<!-- <li class="divider"></li> -->--}}
                                {{--<li><b><div align="center" class="panel panel-default">MANAGE</div></b></li>--}}
                                {{--<!-- <li class="divider"></li> -->--}}
                                {{--<li><a href="/productionTypes">Manage Production Types</a></li>--}}
                                {{--<li><a href="/productions/manage">Manage Productions</a></li>--}}
                                {{--<li><a href="/performances">Manage Performances</a></li>--}}
                            {{--@endif--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="/auth/logout"><b><div align="center" class="panel panel-default"><h4>LOGOUT</h4></div></b></a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>
{{--<ul class="breadcrumb">--}}
{{--<li><a href="#">Home</a> <span class="divider">/</span></li>--}}
{{--<li><a href="#">Library</a> <span class="divider">/</span></li>--}}
{{--<li><a href="/">Home</a><span class="divider">/</span></li>--}}
{{--<li><a href="/productions">Productions</a><span class="divider">/</span></li>--}}
{{--<li class="active">Data</li>--}}
{{--</ul>--}}

@yield('content')


</body>
</html>
