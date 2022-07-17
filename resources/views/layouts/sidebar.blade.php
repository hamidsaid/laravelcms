<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

     
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- goes to look for the assets in public folder -->
    <link href="{{asset('css/libs/libs.css')}}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{  asset('css/libs/font-awesome.css') }}" rel="stylesheet" type="text/css">


</head>
<body>
     <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="">HOME</a></li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                 
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href=""><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
               
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse">
                        <li>
                            <a href="posts.php">View all posts</a>
                        </li>
                        <li>
                            <a href="">Add a post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="fa fa-fw fa-wrench"></i> Categories</a>
                </li>
          
                <li class="active">
                    <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="/admin/users">All Users</a>
                            {{-- this is the better way --}}
                            {{-- <a href="{{ route('admin.users') }}">All Users</a> --}}

                        </li>
                        <li>
                            <a href="/admin/users/create">Create User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                </li>
            </ul>
        </div>
        
        <!-- /.navbar-collapse -->
    </nav>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


  <script src="{{asset('js/libs/libs.js')}}"></script>

  @yield('footer')

</body>
</html>